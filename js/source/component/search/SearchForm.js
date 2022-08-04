import React, { useState, useRef, useEffect, useLayoutEffect } from 'react';

import SearchFormSection from './SearchFormSection';

import IconSVG from '../icon/IconSVG';

import SimpleBar from 'simplebar-react';

import { createDropdown } from '../../utils/plugins';

import * as postRouter from '../../router/post/post-router';
import * as memberRouter from '../../router/member/member-router';
import * as groupRouter from '../../router/group/group-router';

const searchPlaceholderText = vikinger_translation.search_placeholder;

const postTypeSplitIsEnabled = vikinger_constants.settings.post_type_split_display_is_enabled;
const postTypes = vikinger_constants.settings.post_types_to_display_in_search;

const splitPostsByPostType = (posts, postTypes, postTypeProp) => {
  const splittedPosts = {};

  for (const postType of postTypes) {
    splittedPosts[postType] = [];

    for (const post of posts) {
      if (post[postTypeProp] === postType) {
        splittedPosts[postType].push(post);
      }
    }
  }

  return splittedPosts;
};

function SearchForm(props) {
  const [searchText, setSearchText] = useState('');

  const [posts, setPosts] = useState([]);
  const [loadingPosts, setLoadingPosts] = useState(false);

  const [members, setMembers] = useState([]);
  const [loadingMembers, setLoadingMembers] = useState(false);

  const [groups, setGroups] = useState([]);
  const [loadingGroups, setLoadingGroups] = useState(false);

  const searchPostsTimeoutID = useRef(0);
  const searchMembersTimeoutID = useRef(0);
  const searchGroupsTimeoutID = useRef(0);

  const searchDropdownRef = useRef(null);
  const searchDropdown = useRef(false);

  const simplebarStyles = useRef({ overflowX: 'hidden', maxHeight: '420px', paddingBottom: '14px' });

  const postsByPostType = postTypeSplitIsEnabled ? splitPostsByPostType(posts, postTypes, 'post_type') : {};
  const categoryExclude = props.categoryExclude ? props.categoryExclude.split(',') : [];
  const postExclude = props.postExclude ? props.postExclude.split(',') : [];

  useLayoutEffect(() => {
    searchDropdown.current = createDropdown({
      containerElement: searchDropdownRef.current,
      offset: {
        top: 57,
        left: 0
      },
      animation: {
        type: 'translate-top'
      },
      controlToggle: true,
      closeOnWindowClick: false
    });
  }, []);

  const handleSearchTextChange = (e) => {
    setSearchText(e.target.value);
  };

  useEffect(() => {
    if (searchText !== '') {
      setLoadingPosts(true);
      setLoadingMembers(true);
      setLoadingGroups(true);

      searchDropdown.current.showDropdowns();

      // only do member and group search if the BuddyPress plugin is active
      if (vikinger_constants.plugin_active.buddypress) {
        if (vikinger_constants.settings.search_members_enabled) {
          // cancel previous search
          if (searchMembersTimeoutID.current) {
            window.clearTimeout(searchMembersTimeoutID.current);
          }

          searchMembersTimeoutID.current = window.setTimeout(searchMembers, 500);
        }

        if (vikinger_constants.plugin_active.buddypress_groups && vikinger_constants.settings.search_groups_enabled) {
          // cancel previous search
          if (searchGroupsTimeoutID.current) {
            window.clearTimeout(searchGroupsTimeoutID.current);
          }

          searchGroupsTimeoutID.current = window.setTimeout(searchGroups, 500);
        }
      }

      if (vikinger_constants.settings.search_blog_enabled) {
        // cancel previous search
        if (searchPostsTimeoutID.current) {
          window.clearTimeout(searchPostsTimeoutID.current);
        }

        searchPostsTimeoutID.current = window.setTimeout(searchPosts, 500);
      }
    } else {
      // cancel previous search
      if (searchMembersTimeoutID.current) {
        window.clearTimeout(searchMembersTimeoutID.current);
      }

      // cancel previous search
      if (searchGroupsTimeoutID.current) {
        window.clearTimeout(searchGroupsTimeoutID.current);
      }

      // cancel previous search
      if (searchPostsTimeoutID.current) {
        window.clearTimeout(searchPostsTimeoutID.current);
      }

      clearSearch();
    }
  }, [searchText]);

  const clearSearch = () => {
    searchDropdown.current.hideDropdowns();

    setSearchText('');

    setPosts([]);
    setLoadingPosts(false);

    setMembers([]);
    setLoadingMembers(false);

    setGroups([]);
    setLoadingGroups(false);
  };

  const searchMembers = () => {
    setLoadingMembers(true);

    const searchMembersFilters = {
      per_page: 4,
      search: searchText
    };

    // exclude provided user id (logged user)
    if (props.userID) {
      searchMembersFilters.exclude = props.userID;
    }

    const searchMembersPromise = memberRouter.getMembers(searchMembersFilters),
          currentSearch = searchText;

    searchMembersPromise
    .done((response) => {
      // console.log('SEARCH FORM - SEARCH MEMBERS RESPONSE: ', response);

      // cancel search if there was a new one made after this one
      if (searchText !== currentSearch) {
        return;
      } else {
        setMembers(response);
      }
    })
    .fail((error) => {
      // console.log('SEARCH FORM - SEARCH MEMBERS ERROR: ', error);
    })
    .always(() => {
      setLoadingMembers(false);
    });
  };

  const searchGroups = () => {
    setLoadingGroups(true);

    const searchGroupsFilters = {
      per_page: 4,
      search: searchText
      // search_columns: ['name']
    };

    const searchGroupsPromise = groupRouter.getGroups(searchGroupsFilters),
          currentSearch = searchText;

    searchGroupsPromise
    .done((response) => {
      // console.log('SEARCH FORM - SEARCH GROUPS RESPONSE: ', response);

      // cancel search if there was a new one made after this one
      if (searchText !== currentSearch) {
        return;
      } else {
        setGroups(response);
      }
    })
    .fail((error) => {
      // console.log('SEARCH FORM - SEARCH GROUPS ERROR: ', error);
    })
    .always(() => {
      setLoadingGroups(false);
    });
  };

  const searchPosts = () => {
    setLoadingPosts(true);

    const getPostsPromises = [];

    for (const postType of postTypes) {
      const searchPostsFilters = {
        per_page: 4,
        s: searchText,
        post_type: [postType]
      };

      if (props.categoryExclude) {
        searchPostsFilters.category__not_in = categoryExclude;
      }
  
      if (props.postExclude) {
        searchPostsFilters.post__not_in = postExclude;
      }

      const searchPostsPromise = postRouter.getPosts(searchPostsFilters);

      getPostsPromises.push(searchPostsPromise);
    }

    const currentSearch = searchText;

    jQuery
    .when(...getPostsPromises)
    .done((...getPostsResults) => {
      if (searchText !== currentSearch) {
        return;
      } else {
        // console.log('SEARCH FORM - GET POSTS PROMISES - GET POSTS RESULTS: ', getPostsResults);

        let postResults = [];

        if (getPostsPromises.length === 1) {
          postResults = getPostsResults[0];
        } else {
          for (const getPostsResult of getPostsResults) {
            postResults = postResults.concat(getPostsResult[0]);
          }
        }

        // console.log('SEARCH FORM - GET POSTS PROMISES - POST RESULTS: ', postResults);

        setPosts(postResults);
      }
    })
    .fail((error) => {
      // console.log('SEARCH FORM - SEARCH POSTS ERROR: ', error);
    })
    .always(() => {
      setLoadingPosts(false);
    });
  };

  return (
    <div className="search-form-wrap">
      {/* INTERACTIVE INPUT */}
      <div className="interactive-input dark">
        <form className="form" method="get" action={vikinger_constants.home_url}>
          <input  type="text"
                  name="s"
                  value={searchText}
                  placeholder={searchPlaceholderText}
                  onChange={handleSearchTextChange}
          />
          <button style={{ display: 'none' }}></button>
        </form>

        {
          (searchText === '') &&
            <div className="interactive-input-icon-wrap">
              <IconSVG  icon="magnifying-glass"
                        modifiers="interactive-input-icon"
              />
            </div>
        }

        {
          (searchText !== '') &&
            <div className="interactive-input-action" onClick={clearSearch}>
              <IconSVG  icon="cross-thin"
                        modifiers="interactive-input-action-icon"
              />
            </div>
        }
      </div>
      {/* INTERACTIVE INPUT */}

      {/* DROPDOWN BOX */}
      <div ref={searchDropdownRef} className="dropdown-box padding-bottom-small">
        <SimpleBar style={simplebarStyles.current}>
        {
          vikinger_constants.plugin_active.buddypress &&
            <React.Fragment>
            {
              vikinger_constants.settings.search_members_enabled &&
                <SearchFormSection  title={vikinger_translation.members}
                                    type="user"
                                    data={members}
                                    itemLinkProp="link"
                                    loading={loadingMembers}
                
                />
            }
            {
              vikinger_constants.plugin_active.buddypress_groups && vikinger_constants.settings.search_groups_enabled &&
                <SearchFormSection  title={vikinger_translation.groups}
                                    type="group"
                                    data={groups}
                                    itemLinkProp="link"
                                    loading={loadingGroups}

                />
            }
            </React.Fragment>
        }
          
        {
          vikinger_constants.settings.search_blog_enabled &&
            <React.Fragment>
            {
              !postTypeSplitIsEnabled &&
                <SearchFormSection  title={vikinger_translation.posts}
                                    type="post"
                                    data={posts}
                                    itemLinkProp="permalink"
                                    loading={loadingPosts}

                />
            }
            {
              postTypeSplitIsEnabled &&
                Object.keys(postsByPostType).map((key) => {
                  return (
                    <SearchFormSection  key={key}
                                        title={key}
                                        type="post"
                                        data={postsByPostType[key]}
                                        itemLinkProp="permalink"
                                        loading={loadingPosts}

                    />
                  );
                })
            }
            </React.Fragment>
        }
        </SimpleBar>
      </div>
      {/* DROPDOWN BOX */}
    </div>
  );
}

export { SearchForm as default };