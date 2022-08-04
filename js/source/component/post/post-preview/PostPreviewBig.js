import React from 'react';

import IconSVG from '../../icon/IconSVG';

import ContentActions from '../../content-actions/ContentActions';

import TagList from '../../tag/TagList';

import MemberOnlyContentPreview from '../../membership/MemberOnlyContentPreview';

import { truncateText } from '../../../utils/core';

import postUtils from '../../utils/post';

function PostPreviewBig(props) {
  const titleWordLimit = 70;
  const excerptWordLimit = 400;

  const coverStyle = props.data.cover_url ? {background: `url(${props.data.cover_url}) center center / cover no-repeat`} : {};

  const categories = props.data.categories.slice(0, 3);

  const postFormatIcon = postUtils.getPostFormatIcon(props.data.format);

  return (
    <div className={`post-preview medium post-preview-normal animate-slide-down ${!props.data.cover_url ? 'post-preview-no-cover' : ''}`}>
    {
      props.data.cover_url &&
        <a href={props.data.permalink}>
          <div className="post-preview-image" style={coverStyle}></div>
        </a>
    }

      {/* POST PREVIEW INFO */}
      <div className="post-preview-info fixed-height">
      {
        !props.data.cover_url &&
          <div className="post-format-tag">
            <IconSVG modifiers="post-format-tag-icon" icon={postFormatIcon} />
          </div>
      }

        <div className="post-preview-info-top">
          <p className="post-preview-timestamp">
            {
              categories.map((category) => {
                return (
                  <span key={category.id}><a href={category.link}>{category.name}</a> - </span>
                );
              })
            }
            {props.data.timestamp}
          </p>

          <p className="post-preview-title medium">
            <a href={props.data.permalink} dangerouslySetInnerHTML={{__html: truncateText(props.data.title, titleWordLimit)}}></a>
          </p>
        </div>
        <div className="post-preview-info-bottom">
        {
          !props.hidePostExcerpt &&
            <p className="post-preview-text" dangerouslySetInnerHTML={{__html: truncateText(props.data.excerpt, excerptWordLimit)}}></p>
        }
        {
          props.hidePostExcerpt &&
            <MemberOnlyContentPreview modifiers="post-preview-text" />
        }
          <a className="post-preview-link" href={props.data.permalink}>{vikinger_translation.read_more}</a>
        </div>
      </div>
      {/* POST PREVIEW INFO */}

      {/* TAG LIST */}
      <TagList tags={props.data.tags} />
      {/* TAG LIST */}

      {/* CONTENT ACTIONS */}
      <ContentActions reactionData={props.data.reactions}
                      link={props.data.permalink}
                      commentCount={props.data.comment_count}
                      shareCount={props.data.share_count}
      />
      {/* CONTENT ACTIONS */}
    </div>
  );
}

export { PostPreviewBig as default };