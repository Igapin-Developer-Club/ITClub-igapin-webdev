import React, { useState, useRef, useEffect } from 'react';

import UserGroupPreview from '../user-preview/UserGroupPreview';

import UploadBox from '../upload/UploadBox';

import FormInput from '../form/FormInput';
import FormInputCheckbox from '../form/FormInputCheckbox';
import FormTextarea from '../form/FormTextarea';
import FormSelect from '../form/FormSelect';

import FormRow from '../form/FormRow';

import GroupMemberStatusList from '../user-status/user-status-group/user-status-group-member/GroupMemberStatusList';

import Loader from '../loader/Loader';
import LoaderSpinnerSmall from '../loader/LoaderSpinnerSmall';

import { deepMerge } from '../../utils/core';
import { createPopup } from '../../utils/plugins';

import * as groupRouter from '../../router/group/group-router';
import * as forumRouter from '../../router/forum/forum-router';

const getCustomGroupMeta = (data) => {
  const customGroupMeta = {
    social: [
      {
        name: 'Facebook',
        value: '',
        type: 'url'
      },
      {
        name: 'Twitter',
        value: '',
        type: 'url'
      },
      {
        name: 'Instagram',
        value: '',
        type: 'url'
      },
      {
        name: 'Youtube',
        value: '',
        type: 'url'
      },
      {
        name: 'Twitch',
        value: '',
        type: 'url'
      },
      {
        name: 'Discord',
        value: '',
        type: 'url'
      },
      {
        name: 'Patreon',
        value: '',
        type: 'url'
      },
      {
        name: 'Linkedin',
        value: '',
        type: 'url'
      },
      {
        name: 'Pinterest',
        value: '',
        type: 'url'
      },
      {
        name: 'Tiktok',
        value: '',
        type: 'url'
      },
      {
        name: 'Github',
        value: '',
        type: 'url'
      },
      {
        name: 'Reddit',
        value: '',
        type: 'url'
      },
      {
        name: 'Dribbble',
        value: '',
        type: 'url'
      },
      {
        name: 'Unsplash',
        value: '',
        type: 'url'
      },
      {
        name: 'Flickr',
        value: '',
        type: 'url'
      }
    ]
  };

  if (data) {
    for (const customGroupMetaGroupKey in customGroupMeta) {
      const customGroupMetaGroup = customGroupMeta[customGroupMetaGroupKey];

      for (const customGroupMetaField of customGroupMetaGroup) {
        if (typeof data.meta[customGroupMetaField.name] !== 'undefined') {
          customGroupMetaField.value = data.meta[customGroupMetaField.name];
        }
      }
    }
  }

  return customGroupMeta;
};

const createGroupData = {
  name: vikinger_translation.create_new_group,
  status: 'public',
  avatar_url: vikinger_constants.settings.group_avatar_url_default,
  cover_image_url: vikinger_constants.settings.group_cover_image_url_default,
  enable_forum: false
};

const groupStatusOptions = [
  {
    id: 'public',
    name: vikinger_translation.public
  },
  {
    id: 'private',
    name: vikinger_translation.private
  }
];

const defaultForumData = {
  post_title: '',
  post_content: '',
  post_status: 'publish'
};

const forumPrivacyOptions = [
  {
    id: 'publish',
    name: 'Public'
  },
  {
    id: 'private',
    name: 'Private'
  },
  {
    id: 'hidden',
    name: 'Hidden'
  }
];

function GroupManagePopup(props) {
  const creatingGroup = !props.data;

  const popupBoxStyles = useRef(!creatingGroup ? { minHeight: '526px' } : {});

  const defaultGroupData = useRef({
    name: '',
    status: 'public',
    description: '',
    enable_forum: false
  });

  const defaultGroupMeta = useRef(getCustomGroupMeta());

  let initialTab = 'group-info';

  // if editing group
  if (!creatingGroup) {
    // if logged user is not the creator of the group
    if (props.data.creator_id !== props.loggedUser.id) {
      // if logged user is an admin or mod of the group, show members screen
      if (props.data.is_admin || props.data.is_mod) {
        initialTab = 'group-members';
      }
    }
  }

  const [activeTab, setActiveTab] = useState(initialTab);

  const [group, setGroup] = useState(creatingGroup ? createGroupData : false);
  const [groupData, setGroupData] = useState(defaultGroupData.current);

  const [groupMeta, setGroupMeta] = useState(defaultGroupMeta.current);
  const [groupMetaToUpdate, setGroupMetaToUpdate] = useState({});

  const [avatarFile, setAvatarFile] = useState(false);
  const [uploadAvatarActive, setUploadAvatarActive] = useState(false);
  const [uploadAvatarTitle, setUploadAvatarTitle] = useState(vikinger_translation.change_avatar);

  const [coverFile, setCoverFile] = useState(false);
  const [uploadCoverActive, setUploadCoverActive] = useState(false);
  const [uploadCoverTitle, setUploadCoverTitle] = useState(vikinger_translation.change_cover);

  const [markAsRequired, setMarkAsRequired] = useState(false);

  const [saving, setSaving] = useState(false);
  const [error, setError] = useState(false);
  const [deleting, setDeleting] = useState(false);

  const [forum, setForum] = useState(defaultForumData);

  const groupManagePopupRef = useRef(null);
  const popup = useRef(null);

  useEffect(() => {
    popup.current = createPopup({
      triggerElement: props.groupManagePopupTriggerRef.current,
      premadeContentElement: groupManagePopupRef.current,
      type: 'premade',
      popupSelectors: ['group-manage-popup', 'animate-slide-down']
    });

    // only fetch group data if not creating
    if (!creatingGroup) {
      getGroupData();
    }
  }, []);

  const getGroupData = () => {
    const getGroupsPromise = groupRouter.getGroups({ include: [props.data.id], data_scope: 'group-manage' });

    getGroupsPromise
    .done((response) => {
      // console.log('GROUP MANAGE POPUP - GET GROUP DATA RESPONSE: ', response);

      const groupResponseData = response[0];

      const newGroupMeta = getCustomGroupMeta(groupResponseData);

      defaultGroupData.current.name = groupResponseData.name;
      defaultGroupData.current.status = groupResponseData.status;
      defaultGroupData.current.description = groupResponseData.description;
      defaultGroupData.current.enable_forum = groupResponseData.enable_forum;

      setGroup(groupResponseData);
      setGroupMeta(newGroupMeta);

      // use group data to generate default forum title, description and status
      const newForumData = deepMerge(defaultForumData);

      const groupForumStatus = {
        public: 'publish',
        private: 'private',
        hidden: 'hidden'
      };

      newForumData.post_title = groupResponseData.name;
      newForumData.post_content = groupResponseData.description;
      newForumData.post_status = groupForumStatus[groupResponseData.status];

      setForum(newForumData);

      // only fetch group associated forum if bbPress is active and the forums option is enabled
      if (!creatingGroup && vikinger_constants.plugin_active.bbpress && vikinger_constants.settings['bbp_is_group_forums_active']) {
        getGroupAssociatedForum();
      }
    })
    .fail((error) => {
      // console.log('GROUP MANAGE POPUP - GET GROUP DATA ERROR: ', error);
    });
  };

  const getGroupAssociatedForum = () => {
    const getGroupAssociatedForumPromise = forumRouter.getGroupAssociatedForum({ group_id: props.data.id });

    getGroupAssociatedForumPromise
    .done((response) => {
      // console.log('GROUP MANAGE POPUP - GET GROUP ASSOCIATED FORUM RESPONSE: ', props.data.id, response);

      if (response && response.length > 0) {
        const groupForumData = response[0];

        setForum({
          ID: groupForumData.ID,
          post_title: groupForumData.post_title,
          post_content: groupForumData.post_content,
          post_status: groupForumData.post_status
        });
      }
    })
    .fail((error) => {
      // console.log('GROUP MANAGE POPUP - GET GROUP ASSOCIATED FORUM ERROR: ', error);
    });
  };

  const handleChange = (e) => {
    setGroupData(previousGroupData => {
      return {
        ...previousGroupData,
        [e.target.name]: e.target.value
      };
    });

    if (e.target.name === 'status') {
      setGroup(previousGroup => {
        return {
          ...previousGroup,
          status: e.target.value
        };
      });
    }
  };

  const handleForumChange = (e) => {
    setForum(previousForum => {
      return {
        ...previousForum,
        [e.target.name]: e.target.value
      };
    });
  };

  const toggleForumActive = () => {
    setGroup(previousGroup => {
      return {
        ...previousGroup,
        enable_forum: !previousGroup.enable_forum
      };
    });

    setGroupData(previousGroupData => {
      return {
        ...previousGroupData,
        enable_forum: !previousGroupData.enable_forum
      };
    });
  };

  const updateAvatarFile = (file) => {
    // console.log('GROUP MANAGE POPUP - AVATAR FILE: ', file);

    setGroup(previousGroup => {
      return {
        ...previousGroup,
        avatar_url: file.url
      };
    });

    setAvatarFile(file);
    setUploadAvatarActive(true);
    setUploadAvatarTitle(file.file.name);
  };

  const updateCoverFile = (file) => {
    // console.log('GROUP MANAGE POPUP - COVER FILE: ', file);

    setGroup(previousGroup => {
      return {
        ...previousGroup,
        cover_image_url: file.url
      };
    });

    setCoverFile(file);
    setUploadCoverActive(true);
    setUploadCoverTitle(file.file.name);
  };

  const updateSocialMeta = (field, data) => {
    // console.log('GROUP MANAGE POPUP - SOCIAL FIELD UPDATE: ', field, data);

    setGroupMeta(previousGroupMeta => {
      const newGroupMeta = deepMerge(previousGroupMeta);

      for (const socialMeta of newGroupMeta.social) {
        if (socialMeta.name === field.name) {
          socialMeta.value = data.target.value;
          break;
        }
      }

      return newGroupMeta;
    });

    setGroupMetaToUpdate(previousGroupMetaToUpdate => {
      return {
        ...previousGroupMetaToUpdate,
        [field.name]: data.target.value
      };
    });
  };

  const discardAll = () => {
    setGroupData(defaultGroupData.current);
    setGroupMeta(defaultGroupMeta.current);
    setGroupMetaToUpdate({});

    setAvatarFile(false);
    setUploadAvatarActive(false);
    setUploadAvatarTitle(vikinger_translation.change_avatar);

    setCoverFile(false);
    setUploadCoverActive(false);
    setUploadCoverTitle(vikinger_translation.change_cover);

    setMarkAsRequired(false);
    setError(false);
  };

  const getGroupDataUpdatedFields = () => {
    // group updated fields
    const updatedFields = {};

    // only update group data if it changed
    for (const groupField in groupData) {
      // if group field value changed from the original value, add it to update it
      if (groupData[groupField] !== defaultGroupData.current[groupField]) {
        updatedFields[groupField] = groupData[groupField];
      }
    }

    return Object.keys(updatedFields).length > 0 ? updatedFields : false;
  };

  const deleteGroup = () => {
    // if already deleting, return
    if (deleting) {
      return;
    }

    setDeleting(true);

    const deleteGroupPromise = groupRouter.deleteGroup(props.data.id);

    deleteGroupPromise
    .done((response) => {
      // console.log('GROUP MANAGE POPUP - GROUP DELETE RESPONSE: ', response);

      // refresh
      window.location.reload();
    })
    .fail((error) => {
      // console.log('GROUP MANAGE POPUP - GROUP DELETE ERROR: ', error);

      setDeleting(false);
    });
  };

  const save = () => {
    // if already saving, return
    if (saving) {
      return;
    }

    setError(false);
    setSaving(true);
    setMarkAsRequired(false);

    // if creating a group
    if (creatingGroup) {
      // console.log('GROUP MANAGE POPUP - CREATING');

      // if required fields have no value, show message and return
      if ((groupData.name === '') || (groupData.description === '')) {
        setSaving(false);
        setMarkAsRequired(true);

        // console.log('GROUP MANAGE POPUP - MISSING REQUIRED FIELDS');

        return;
      }

      // create group
      const createGroupConfig = deepMerge(groupData, { creator_id: props.loggedUser.id }),
            createGroupPromise = groupRouter.createGroup(createGroupConfig);

      // console.log('GROUP MANAGE POPUP - CREATE GROUP WITH DATA: ', groupData);

      createGroupPromise.done((response) => {
        // console.log('GROUP MANAGE POPUP - CREATE GROUP RESPONSE: ', response);

        let uploadAvatarPromise = { no_result: true },
            uploadCoverPromise = { no_result: true },
            updateGroupMetaPromise = { no_result: true };

        const avatarChanged = avatarFile,
              coverChanged = coverFile,
              groupMetaChanged = Object.keys(groupMetaToUpdate).length > 0;

        // if avatar, cover or group meta changed, save them
        if (avatarChanged || coverChanged || groupMetaChanged) {
          const createdGroupID = response.data[0].id;

          // if user changed avatar, save it
          if (avatarChanged) {
            uploadAvatarPromise = groupRouter.uploadGroupAvatar({
              group_id: createdGroupID,
              file: avatarFile.file
            });
          }

          // if user changed cover, save it
          if (coverChanged) {
            uploadCoverPromise = groupRouter.uploadGroupCover({
              group_id: createdGroupID,
              file: coverFile.file
            });
          }

          // if user updated group meta, save it
          if (groupMetaChanged) {
            updateGroupMetaPromise = groupRouter.updateGroupMetaFields({
              group_id: createdGroupID,
              fields: groupMetaToUpdate
            });
          }

          jQuery
          .when(uploadAvatarPromise, uploadCoverPromise, updateGroupMetaPromise)
          .done((avatarUploadResponse, coverUploadResponse, updateGroupMetaResponse) => {
            // console.log('GROUP MANAGE POPUP - AVATAR UPLOAD RESPONSE:', avatarUploadResponse);
            // console.log('GROUP MANAGE POPUP - COVER UPLOAD RESPONSE:', coverUploadResponse);
            // console.log('GROUP MANAGE POPUP - GROUP META UPDATE RESPONSE:', updateGroupMetaResponse);
          })
          .fail((error) => {
            // console.log('GROUP MANAGE POPUP - UPLOAD AVATAR/COVER OR UPDATE GROUP META ERROR: ', error);
          })
          .always(() => {
            // refresh
            window.location.reload();
          });
        } else {
          // refresh
          window.location.reload();
        }
      })
      .fail((error) => {
        // console.log('GROUP MANAGE POPUP - CREATE GROUP ERROR: ', error);

        const errorObject = error.responseJSON && error.responseJSON.message ? error.responseJSON : {message: vikinger_translation.create_group_error};

        setError(errorObject);
        setSaving(false);
      });
    } else {
    // if editing a group
      // console.log('GROUP MANAGE POPUP - EDITING');

      // if required fields have no value, show message and return
      const emptyGroupName = groupData.name === '',
            emptyGroupDescription = groupData.description === '',
            usingForum = vikinger_constants.plugin_active.bbpress && vikinger_constants.settings['bbp_is_group_forums_active'] && groupData.enable_forum,
            emptyForumName = forum.post_title === '',
            emptyForumDescription = forum.post_content === '';

      if ((emptyGroupName || emptyGroupDescription) || (usingForum && (emptyForumName || emptyForumDescription))) {
        setSaving(false);
        setMarkAsRequired(true);

        // console.log('GROUP MANAGE POPUP - MISSING REQUIRED FIELDS');

        return;
      }

      let updateGroupDataPromise = { no_result: true },
          uploadAvatarPromise = { no_result: true },
          uploadCoverPromise = { no_result: true },
          deleteGroupMetaPromise = { no_result: true },
          updateGroupMetaPromise = { no_result: true };

      // get group data updated fields
      const updatedFields = getGroupDataUpdatedFields();

      // if there are updated fields, update them
      if (updatedFields) {
        // set group id to update
        updatedFields.id = props.data.id;

        updateGroupDataPromise = groupRouter.updateGroup(updatedFields);
      }

      // console.log('GROUP MANAGE POPUP - GROUP DATA UPDATED FIELDS: ', updatedFields);

      const avatarChanged = avatarFile,
            coverChanged = coverFile,
            groupMetaChanged = Object.keys(groupMetaToUpdate).length > 0,
            forumChanged = usingForum;

      // if there is nothing to update, return
      if (!updatedFields && !avatarChanged && !coverChanged && !groupMetaChanged && !forumChanged) {
        setSaving(false);

        return;
      }

      // if avatar, cover or group meta changed, save them
      if (avatarChanged || coverChanged || groupMetaChanged) {
        const createdGroupID = props.data.id;

        // if user changed avatar, save it
        if (avatarChanged) {
          uploadAvatarPromise = groupRouter.uploadGroupAvatar({
            group_id: createdGroupID,
            file: avatarFile.file
          });
        }

        // if user changed cover, save it
        if (coverChanged) {
          uploadCoverPromise = groupRouter.uploadGroupCover({
            group_id: createdGroupID,
            file: coverFile.file
          });
        }

        // if user updated group meta, save it
        if (groupMetaChanged) {
          const groupMetaFieldsToDelete = [],
                groupMetaFieldsToUpdate = {};

          // console.log('GROUP MANAGE POPUP - GROUP META TO UPDATE STATE: ', groupMetaToUpdate);

          // only update meta fields if they are not empty, otherwise delete them
          for (const metaKey in groupMetaToUpdate) {
            const metaValue = groupMetaToUpdate[metaKey];

            if (metaValue === '') {
              groupMetaFieldsToDelete.push(metaKey);
            } else {
              groupMetaFieldsToUpdate[metaKey] = metaValue;
            }
          }

          // console.log('GROUP MANAGE POPUP - GROUP META TO DELETE: ', groupMetaFieldsToDelete);
          // console.log('GROUP MANAGE POPUP - GROUP META TO UPDATE: ', groupMetaFieldsToUpdate);

          if (groupMetaFieldsToDelete.length > 0) {
            // delete empty meta
            deleteGroupMetaPromise = groupRouter.deleteGroupMetaFields({
              group_id: createdGroupID,
              fields: groupMetaFieldsToDelete
            });
          }

          if (Object.keys(groupMetaFieldsToUpdate).length > 0) {
            // update non empty meta
            updateGroupMetaPromise = groupRouter.updateGroupMetaFields({
              group_id: createdGroupID,
              fields: groupMetaFieldsToUpdate
            });
          }
        }
      }

      let createGroupForumPromise = { no_result: true },
          deleteGroupForumPromise = { no_result: true };

      // associate forum to group
      if (forumChanged) {
        const forumData = deepMerge(forum);

        // console.log('GROUP MANAGE POPUP - UPDATE FORUM WITH DATA: ', forumData);

        createGroupForumPromise = forumRouter.createGroupForum(forumData, props.data.id);
      } else if (forum.ID) {
        // console.log('GROUP MANAGE POPUP - DELETE FORUM WITH DATA: ', forum);

        deleteGroupForumPromise = forumRouter.deleteGroupForum({forum_id: forum.ID, group_id: props.data.id});
      }

      jQuery
      .when(updateGroupDataPromise, uploadAvatarPromise, uploadCoverPromise, updateGroupMetaPromise, deleteGroupMetaPromise, createGroupForumPromise, deleteGroupForumPromise)
      .done((updateGroupDataPromiseResponse, avatarUploadResponse, coverUploadResponse, updateGroupMetaResponse, deleteGroupMetaResponse, createGroupForumResponse, deleteGroupForumResponse) => {
        // console.log('GROUP MANAGE POPUP - GROUP DATA UPDATE RESPONSE:', updateGroupDataPromiseResponse);
        // console.log('GROUP MANAGE POPUP - AVATAR UPLOAD RESPONSE:', avatarUploadResponse);
        // console.log('GROUP MANAGE POPUP - COVER UPLOAD RESPONSE:', coverUploadResponse);
        // console.log('GROUP MANAGE POPUP - GROUP META UPDATE RESPONSE:', updateGroupMetaResponse);
        // console.log('GROUP MANAGE POPUP - GROUP META DELETE RESPONSE:', deleteGroupMetaResponse);
        // console.log('GROUP MANAGE POPUP - CREATE GROUP FORUM RESPONSE:', createGroupForumResponse);
        // console.log('GROUP MANAGE POPUP - DELETE FORUM RESPONSE:', deleteGroupForumResponse);

        window.location.reload();
      })
      .fail((error) => {
        // console.log('GROUP MANAGE POPUP - GROUP DATA UPDATE: ', error);

        const errorObject = error.responseJSON && error.responseJSON.message ? error.responseJSON : {message: vikinger_translation.update_group_error};

        setError(errorObject);
        setSaving(false);
      });
    }
  };

  const groupSocialMetaRows = [];

  let i = 0,
      groupSocialMetaFields = [];

  for (const field of groupMeta.social) {
    if (i === 2) {
      groupSocialMetaRows.push(groupSocialMetaFields);
      i = 0;
      groupSocialMetaFields = [];
    }

    groupSocialMetaFields.push(field);
    i++;
  }

  // dump remaining fields
  if (groupSocialMetaFields.length > 0) {
    groupSocialMetaRows.push(groupSocialMetaFields);
  }

  return (
    <div ref={groupManagePopupRef} className="popup-box-body" style={popupBoxStyles.current}>
    {
      !creatingGroup && !group &&
        <Loader />
    }
    {
      (creatingGroup || (!creatingGroup && group)) &&
        <React.Fragment>
          <div className="popup-box-sidebar">
            <UserGroupPreview data={group}
                              descriptionText={props.groupPreviewDescription}
            />

            <div className="sidebar-menu-item limited">
              <div className="sidebar-menu-body secondary">
              {
                (creatingGroup || props.data.is_admin) &&
                  <React.Fragment>
                    <p  className={`sidebar-menu-link ${activeTab === 'group-info' ? 'active' : ''}`}
                        onClick={() => {setActiveTab('group-info');}}>
                      {vikinger_translation.group_info}
                    </p>

                    <p  className={`sidebar-menu-link ${activeTab === 'group-avatar-cover' ? 'active' : ''}`}
                        onClick={() => {setActiveTab('group-avatar-cover');}}>
                      {vikinger_translation.avatar_and_cover}
                    </p>

                    <p  className={`sidebar-menu-link ${activeTab === 'group-social' ? 'active' : ''}`}
                        onClick={() => {setActiveTab('group-social');}}>
                      {vikinger_translation.social_networks}
                    </p>

                    
                  </React.Fragment>
              }
              {
                !creatingGroup &&
                  <React.Fragment>
                  {
                    (props.data.is_admin || props.data.is_mod) &&
                      <p  className={`sidebar-menu-link ${activeTab === 'group-members' ? 'active' : ''}`}
                          onClick={() => {setActiveTab('group-members');}}>
                        {vikinger_translation.members}
                      </p>
                  }
                  {
                    props.data.is_admin &&
                      <React.Fragment>
                        {
                          vikinger_constants.plugin_active.bbpress && vikinger_constants.settings['bbp_is_group_forums_active'] &&
                            <p  className={`sidebar-menu-link ${activeTab === 'group-forum' ? 'active' : ''}`}
                                onClick={() => {setActiveTab('group-forum');}}>
                              {vikinger_translation.forum}
                            </p>
                        }

                        <p  className={`sidebar-menu-link ${activeTab === 'group-delete' ? 'active' : ''}`}
                          onClick={() => {setActiveTab('group-delete');}}>
                          {vikinger_translation.delete_group}
                        </p>
                      </React.Fragment>
                  }
                  </React.Fragment>
              }
              </div>
            </div>

            {
              (creatingGroup || (!creatingGroup && props.data.is_admin)) &&
                <div className="popup-box-sidebar-footer">
                  <div className="button secondary full" onClick={save}>
                  {
                    !saving &&
                      <React.Fragment>
                        {creatingGroup ? vikinger_translation.create_group : vikinger_translation.save_changes}
                      </React.Fragment>
                  }
                  {
                    saving &&
                      <React.Fragment>
                        {creatingGroup ? vikinger_translation.creating : vikinger_translation.saving}
                        <LoaderSpinnerSmall />
                      </React.Fragment>
                  }
                  </div>
                {
                  markAsRequired &&
                    <p className="required-field-message">* {vikinger_translation.required_fields_message}</p>
                }
                {
                  error && error.message &&
                    <p className="required-field-message">* {error.message}</p>
                }
                  <p className="button white full" onClick={discardAll}>{vikinger_translation.discard_all}</p>
                </div>
            }
          </div>

          <div className="popup-box-content limited">
          {
            activeTab === 'group-info' &&
              <div className="widget-box">
                <p className="widget-box-title">{vikinger_translation.group_info}</p>

                <div className="widget-box-content">
                  <div className="form">
                    <div className="form-row split">
                      <div className="form-item">
                        <FormInput  name="name"
                                    label={vikinger_translation.group_name}
                                    value={groupData.name}
                                    handleValue
                                    onChange={handleChange}
                                    required
                                    markAsRequired={markAsRequired && (groupData.name === '')}
                                    modifiers="small"
                        />
                      </div>

                      <div className="form-item">
                        <FormSelect name="status"
                                    label={vikinger_translation.group_status}
                                    options={groupStatusOptions}
                                    value={groupData.status}
                                    handleValue
                                    onChange={handleChange}
                                    modifiers="small"
                        />
                      </div>
                    </div>

                    <div className="form-row">
                      <div className="form-item">
                        <FormTextarea name="description"
                                      label={vikinger_translation.group_description}
                                      value={groupData.description}
                                      handleValue
                                      onChange={handleChange}
                                      required
                                      markAsRequired={markAsRequired && (groupData.description === '')}
                                      modifiers="small mid-textarea"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          }

          {
            activeTab === 'group-avatar-cover' &&
              <div className="widget-box">
                <p className="widget-box-title">{vikinger_translation.avatar_and_cover}</p>

                <div className="widget-box-content">
                  {/* GRID */}
                  <div className="grid grid-3-3-3 centered">
                    <UploadBox  title={uploadAvatarTitle}
                                onFileSelect={updateAvatarFile}
                                active={uploadAvatarActive}
                                modifiers="upload-box-shadowed"
                    />

                    <UploadBox  title={uploadCoverTitle}
                                onFileSelect={updateCoverFile}
                                active={uploadCoverActive}
                                modifiers="upload-box-shadowed"
                    />
                  </div>
                  {/* GRID */}
                </div>
              </div>
          }

          {
            activeTab === 'group-social' &&
              <div className="widget-box">
                <p className="widget-box-title">{vikinger_translation.social_networks}</p>

                <div className="widget-box-content">
                  <div className="form">
                  {
                    groupSocialMetaRows.map((fields, i) => {
                      return (
                        <FormRow  key={i}
                                  data={fields}
                                  modifiers="split"
                                  handleValue
                                  onFieldUpdate={updateSocialMeta}
                        />
                      );
                    })
                  }
                  </div>
                </div>
              </div>
          }

          {
            !creatingGroup &&
              <React.Fragment>
                {
                  activeTab === 'group-members' &&
                    <div className="widget-box right-padded">
                      <p className="widget-box-title">{`${vikinger_translation.administrators} (${group.admins.length})`}</p>

                      <div className="widget-box-content">
                        <GroupMemberStatusList  data={group.admins}
                                                group={group}
                                                loggedUser={props.loggedUser}
                                                onActionComplete={getGroupData}
                        />
                      </div>

                      <p className="widget-box-title">{`${vikinger_translation.mods} (${group.mods.length})`}</p>

                      {
                        (group.mods.length === 0) &&
                          <p className="no-results-text">{vikinger_translation.no_mods_found}</p>
                      }

                      {
                        (group.mods.length > 0) &&
                          <div className="widget-box-content">
                            <GroupMemberStatusList  data={group.mods}
                                                    group={group}
                                                    loggedUser={props.loggedUser}
                                                    onActionComplete={getGroupData}
                            />
                          </div>
                      }

                      <p className="widget-box-title">{`${vikinger_translation.members} (${group.members.length})`}</p>

                      {
                        (group.members.length === 0) &&
                          <p className="no-results-text">{vikinger_translation.no_members_found}</p>
                      }

                      {
                        (group.members.length > 0) &&
                          <div className="widget-box-content">
                            <GroupMemberStatusList  data={group.members}
                                                    group={group}
                                                    loggedUser={props.loggedUser}
                                                    onActionComplete={getGroupData}
                            />
                          </div>
                      }

                      <p className="widget-box-title">{`${vikinger_translation.banned_members} (${group.banned.length})`}</p>

                      {
                        (group.banned.length === 0) &&
                          <p className="no-results-text">{vikinger_translation.no_banned_members_found}</p>
                      }

                      {
                        (group.banned.length > 0) &&
                          <div className="widget-box-content">
                            <GroupMemberStatusList  data={group.banned}
                                                    group={group}
                                                    loggedUser={props.loggedUser}
                                                    onActionComplete={getGroupData}
                            />
                          </div>
                      }
                    </div>
                }

                {
                  activeTab === 'group-forum' &&
                    <div className="widget-box">
                      <p className="widget-box-title">{vikinger_translation.forum}</p>

                      <div className="widget-box-content">
                        <p className="widget-box-text"><span className="bold">{vikinger_translation.group_forum}</span></p>
                        <p className="widget-box-text">{vikinger_translation.group_forum_enable_title}</p>
                        <FormInputCheckbox  text={vikinger_translation.group_forum_enable_text}
                                            active={groupData.enable_forum}
                                            toggleActive={toggleForumActive}
                        />

                        {
                          groupData.enable_forum &&
                            <div className="widget-box-form">
                              <FormInput  name="post_title"
                                          label={vikinger_translation.forum_name}
                                          value={forum.post_title}
                                          handleValue
                                          onChange={handleForumChange}
                                          required
                                          markAsRequired={markAsRequired && (forum.post_title === '')}
                                          modifiers="small"
                              />

                              <FormTextarea name="post_content"
                                            label={vikinger_translation.forum_description}
                                            value={forum.post_content}
                                            handleValue
                                            onChange={handleForumChange}
                                            required
                                            markAsRequired={markAsRequired && (forum.post_content === '')}
                                            modifiers="small mid-textarea"
                              />

                              <FormSelect name="post_status"
                                          label={vikinger_translation.forum_privacy}
                                          options={forumPrivacyOptions}
                                          value={forum.post_status}
                                          handleValue
                                          onChange={handleForumChange}
                                          modifiers="small"
                              />
                            </div>
                        }
                      </div>
                    </div>
                }

                {
                  activeTab === 'group-delete' &&
                    <div className="widget-box">
                      <p className="widget-box-title">{vikinger_translation.delete_group}</p>

                      <div className="widget-box-content">
                        <p className="widget-box-text">{vikinger_translation.delete_group_text}</p>
                        <p className="widget-box-text"><span className="bold">{vikinger_translation.delete_group_confirmation}</span></p>
                        <div className="button tertiary" onClick={deleteGroup}>
                          { vikinger_translation.delete_group }
                          {
                            deleting &&
                              <LoaderSpinnerSmall />
                          }
                        </div>
                      </div>
                    </div>
                }
              </React.Fragment>
          }
          </div>
        </React.Fragment>
    }
    </div>
  );
}

export { GroupManagePopup as default };