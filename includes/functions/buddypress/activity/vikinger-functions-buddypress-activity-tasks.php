<?php
/**
 * Functions - BuddyPress - Activity - Tasks
 * 
 * @package Vikinger
 * 
 * @since 1.9.1
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_activity_media_create_task')) {
  /**
   * Get activity media creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_activity_media_create_task($args) {
    $task_execute = function ($args, $media_id) {
      $activity_media_args = [
        'item_id'           => $args['item_id'],
        'secondary_item_id' => $media_id,
        'component'         => $args['component'],
        'type'              => $args['type'],
        'hide_sitewide'     => $args['hide_sitewide']
      ];

      if (array_key_exists('content', $args)) {
        $activity_media_args['content'] = $args['content'];
      }

      $result = vikinger_create_activity($activity_media_args);

      return $result;
    };

    $task_rewind = function ($args, $activity_id) {
      
    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_activity_create_meta_attachedmedia_type_task')) {
  /**
   * Get activity attached media type meta creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_activity_create_meta_attachedmedia_type_task($args) {
    $task_execute = function ($args) {
      $meta_args = [
        'activity_id' => $args['activity_id'],
        'meta_key'    => 'attached_media_type',
        'meta_value'  => $args['type']
      ];

      $result = vikinger_update_activity_meta($meta_args);

      return $result;
    };

    $task_rewind = function ($args, $activity_id) {

    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_activity_create_meta_attachedmedia_id_task')) {
  /**
   * Get activity attached media id meta creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_activity_create_meta_attachedmedia_id_task($args) {
    $task_execute = function ($args) {
      $meta_args = [
        'activity_id' => $args['activity_id'],
        'meta_key'    => 'attached_media_id',
        'meta_value'  => $args['id']
      ];

      $result = vikinger_update_activity_meta($meta_args);

      return $result;
    };

    $task_rewind = function ($args, $activity_id) {

    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_activity_create_meta_uploadedmedia_id_task')) {
  /**
   * Get activity uploaded media id meta creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_activity_create_meta_uploadedmedia_id_task($activity_id) {
    $task_execute = function ($activity_id, $media_id) {
      $meta_args = [
        'activity_id' => $activity_id,
        'meta_key'    => 'uploaded_media_id',
        'meta_value'  => $media_id
      ];

      $result = vikinger_add_activity_meta($meta_args);

      if ($result) {
        return $media_id;
      }

      return false;
    };

    $task_rewind = function ($activity_id, $meta_id) {
      
    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $activity_id);

    return $task;
  }
}

if (!function_exists('vikinger_activity_create_meta_share_count_task')) {
  /**
   * Get activity share count meta creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_activity_create_meta_share_count_task($args) {
    $task_execute = function ($args) {
      $meta_args = [
        'activity_id' => $args['id'],
        'meta_key'    => 'share_count',
        'meta_value'  => $args['count']
      ];

      $result = vikinger_update_activity_meta($meta_args);

      if ($result) {
        return $args['id'];
      }

      return false;
    };

    $task_rewind = function ($args, $activity_id) {

    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

?>