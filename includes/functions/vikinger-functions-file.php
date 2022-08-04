<?php
/**
 * Functions - File
 * 
 * @package Vikinger
 * 
 * @since 1.0.0
 * 
 * @author Odin Design Themes (https://odindesignthemes.com/)
 * 
 */

if (!function_exists('vikinger_upload_file')) {
  /**
   * Upload file to the WordPress uploads directory
   * 
   * @param array   $file_data
   * @param array   $component
   * @param string  $file_data_type
   * @return array
   */
  function vikinger_upload_file($file_data, $component, $file_type) {
    // jpg, jpeg, png, mp4, etc
    $file_extension = strtolower(pathinfo($file_data['name'], PATHINFO_EXTENSION));
    $file_name = pathinfo($file_data['name'], PATHINFO_FILENAME);

    // remove whitespace from file name
    $file_name = preg_replace('/\s+/', '', $file_name);
    
    // allowed file extensions
    $allowed_file_type_extensions = vikinger_settings_media_allowed_extensions_get($file_type);
    $allowed_file_type_extensions_are_case_sensitive = vikinger_settings_media_allowed_extensions_are_case_sensitive($file_type);

    foreach ($allowed_file_type_extensions as $allowed_file_extension) {
      $file_extension_case_sensitive_matches = $file_extension === $allowed_file_extension;
      $file_extension_case_insensitive_matches = strtolower($file_extension) === strtolower($allowed_file_extension);

      $uploaded_file_extension_is_allowed = $allowed_file_type_extensions_are_case_sensitive ? $file_extension_case_sensitive_matches : $file_extension_case_insensitive_matches;

      // if uploaded file extension is allowed
      if ($uploaded_file_extension_is_allowed) {
        // get upload path function string
        $upload_path = vikinger_get_component_upload_path($component);

        // create path if it doesn't exist
        vikinger_create_directory($upload_path);

        // create file path
        $file_path = $upload_path . '/' . $file_name . '.' . $file_extension;

        // loop while a file with that name already exists,
        // add a number to the end of the filename until no file exists with that name
        $i = 0;
        while (file_exists($file_path)) {
          $file_name .= $i;
          $file_path = $upload_path . '/' . $file_name . '.' . $file_extension;
          $i++;
        }

        // true if successfully moved file, false if not
        $result = move_uploaded_file($file_data['tmp_name'], $file_path);

        if ($result) {
          $uploaded_file_path = vikinger_get_component_upload_path($component) . '/' . $file_name . '.' . $file_extension;
          $uploaded_file_url = vikinger_get_component_upload_url($component) . '/' . $file_name . '.' . $file_extension;

          /**
           * File uploaded action.
           * 
           * @param string $uploaded_file_path
           */
          do_action('vikinger_file_uploaded', $uploaded_file_path);

          return [
            'name'    => $file_name,
            'type'    => $file_extension,
            'link'    => $uploaded_file_url,
            'user_id' => $component['uploader_id']
          ];
        }
      }
    }

    return false;
  }
}

if (!function_exists('vikinger_file_default_allowed_extensions_get')) {
  /**
   * Get default allowed file type extensions
   * 
   * @param string  $file_type                      File type. One of: 'image', 'video'.
   * @param string  $format                         Format of the returned extensions: One of: 'array', 'string'.
   * @return array  $allowed_file_type_extensions   File extensions allowed for provided file type.
   */
  function vikinger_file_default_allowed_extensions_get($file_type, $format = 'string') {
    $allowed_file_type_extensions = [];

    $allowed_file_extensions = [
      'image' => ['jpg', 'jpeg', 'png', 'gif'],
      'video' => ['mp4', 'mkv']
    ];

    /**
     * Filter file default allowed extensions.
     * 
     * @since 1.9.1
     * 
     * @param array $allowed_file_extensions
     */
    $allowed_file_extensions = apply_filters('vikinger_file_default_allowed_extensions', $allowed_file_extensions);

    $allowed_file_type_extensions = array_key_exists($file_type, $allowed_file_extensions) ? $allowed_file_extensions[$file_type] : [];

    if ($format === 'string') {
      $allowed_file_type_extensions = implode(',', $allowed_file_type_extensions);
    }

    return $allowed_file_type_extensions;
  }
}

if (!function_exists('vikinger_delete_file')) {
  /**
   * Delete a file
   * 
   * @param string $filepath    Complete path to the file
   * @param array $component
   * @return bool
   */
  function vikinger_delete_file($filepath) {
    wp_delete_file($filepath);

    /**
     * File deleted action.
     * 
     * @param string $filepath
     */
    do_action('vikinger_file_deleted', $filepath);

    return true;
  }
}

if (!function_exists('vikinger_media_user_media_delete')) {
  /**
   * Delete user media directory if a user is deleted
   */
  function vikinger_media_user_media_delete($user_id) {
    $result = WP_Filesystem();

    if ($result) {
      global $wp_filesystem;

      $member_uploads_path = vikinger_get_member_uploads_path($user_id);

      // recursively remove files / directories
      $wp_filesystem->delete($member_uploads_path, true);
    }
  }
}

add_action('deleted_user', 'vikinger_media_user_media_delete');

if (!function_exists('vikinger_media_group_media_delete')) {
  /**
   * Delete group media directory if a group is deleted
   */
  function vikinger_media_group_media_delete($group_id) {
    $result = WP_Filesystem();

    if ($result) {
      global $wp_filesystem;

      $group_uploads_path = vikinger_get_group_uploads_path($group_id);

      // recursively remove files / directories
      $wp_filesystem->delete($group_uploads_path, true);
    }
  }
}

add_action('groups_delete_group', 'vikinger_media_group_media_delete');

if (!function_exists('vikinger_get_component_upload_path')) {
  /**
   * Get component upload path
   * 
   * @param array $component  Component type and id of the upload path to get
   * @return string
   */
  function vikinger_get_component_upload_path($component) {
    if ($component['type'] === 'member') {
      return vikinger_get_member_uploads_path($component['id']);
    }

    if ($component['type'] === 'group') {
      return vikinger_get_group_uploads_path($component['id']);
    }
  }
}

if (!function_exists('vikinger_get_component_upload_url')) {
  /**
   * Get component upload url
   * 
   * @param array $component  Component type and id of the upload url to get
   * @return string
   */
  function vikinger_get_component_upload_url($component) {
    if ($component['type'] === 'member') {
      return vikinger_get_member_uploads_url($component['id']);
    }

    if ($component['type'] === 'group') {
      return vikinger_get_group_uploads_url($component['id']);
    }
  }
}

if (!function_exists('vikinger_get_member_root_uploads_path')) {
   /**
   * Get member root uploads path
   * 
   * @return string
   */
  function vikinger_get_member_root_uploads_path() {
    $path = VIKINGER_UPLOADS_PATH . '/member/';

    /**
     * Filter member root uploads path.
     * 
     * @since 1.9.1
     * 
     * @param string $path
     */
    $path = apply_filters('vikinger_file_member_root_uploads_path', $path);

    return $path;
  }
}

if (!function_exists('vikinger_get_member_uploads_path')) {
  /**
   * Get a specific member upload path
   * 
   * @param int $member_id  ID of the member to get the path of
   * @return string
   */
  function vikinger_get_member_uploads_path($member_id) {
    $path = vikinger_get_member_root_uploads_path() . $member_id;

    return $path;
  }
}

if (!function_exists('vikinger_get_group_root_uploads_path')) {
  /**
  * Get group root uploads path
  * 
  * @return string
  */
  function vikinger_get_group_root_uploads_path() {
    $path = VIKINGER_UPLOADS_PATH . '/group/';

    /**
      * Filter group root uploads path.
      * 
      * @since 1.9.1
      * 
      * @param string $path
      */
    $path = apply_filters('vikinger_file_group_root_uploads_path', $path);

    return $path;
  }
}

if (!function_exists('vikinger_get_group_uploads_path')) {
  /**
   * Get a specific group uploads path.
   * 
   * @param int $group_id   ID of the group to get the path of.
   * @return string
   */
  function vikinger_get_group_uploads_path($group_id) {
    $path = vikinger_get_group_root_uploads_path() . $group_id;

    return $path;
  }
}

if (!function_exists('vikinger_get_member_root_uploads_url')) {
  /**
  * Get member root uploads url.
  * 
  * @return string
  */
  function vikinger_get_member_root_uploads_url() {
    $url = VIKINGER_UPLOADS_URL . '/member/';

    /**
      * Filter member root uploads url.
      * 
      * @since 1.9.1
      * 
      * @param string $url
      */
    $url = apply_filters('vikinger_file_member_root_uploads_url', $url);

    return $url;
  }
}

if (!function_exists('vikinger_get_member_uploads_url')) {
  /**
   * Get a specific member uploads url.
   * 
   * @param int $member_id  ID of the member to get the url of.
   * @return string
   */
  function vikinger_get_member_uploads_url($member_id) {
    $url = vikinger_get_member_root_uploads_url() . $member_id;

    return $url;
  }
}

if (!function_exists('vikinger_get_group_root_uploads_url')) {
  /**
  * Get group root uploads url.
  * 
  * @return string
  */
  function vikinger_get_group_root_uploads_url() {
    $url = VIKINGER_UPLOADS_URL . '/group/';

    /**
      * Filter group root uploads url.
      * 
      * @since 1.9.1
      * 
      * @param string $url
      */
    $url = apply_filters('vikinger_file_group_root_uploads_url', $url);

    return $url;
  }
}

if (!function_exists('vikinger_get_group_uploads_url')) {
  /**
   * Get a specific group upload url.
   * 
   * @param int $group_id   ID of the group to get the url of.
   * @return string
   */
  function vikinger_get_group_uploads_url($group_id) {
    $url = vikinger_get_group_root_uploads_url() . $group_id;

    return $url;
  }
}

if (!function_exists('vikinger_create_directory')) {
  /**
   * Create directory using path
   * 
   * @param string $path  Directory path to create
   * @return boolean
   */
  function vikinger_create_directory($path) {
    $result = WP_Filesystem();

    if ($result) {
      global $wp_filesystem;

      if (!$wp_filesystem->exists($path)) {
        // true on success, false on failure
        $result = wp_mkdir_p($path);
      } else {
        // directory already exists
        $result = true;
      }
    }

    return $result;
  }
}

if (!function_exists('vikinger_php_files_to_array')) {
  /**
   * Converts php $_FILES form data array to regular array
   * 
   * @param array $php_files   $_FILES array
   * @return array
   */
  function vikinger_php_files_to_array($php_files) {
    $files = [];

    foreach ($php_files as $key => $value) {
      for ($i = 0; $i < count($value); $i++) {
        $files[$i][$key] = $value[$i];
      }
    }

    return $files;
  }
}

if (!function_exists('vikinger_file_create_task')) {
  /**
   * Get file creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_file_create_task($args) {
    $task_execute = function ($args) {
      $result = vikinger_upload_file($args['file_data'], $args['component'], $args['file_data_type']);

      return $result;
    };

    $task_rewind = function ($args) {
      $filepath = vikinger_get_component_upload_path($args['component']) . '/' . $args['file_data']['name'];
      $result = vikinger_delete_file($filepath);
    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_file_create_media_entry_task')) {
  /**
   * Get file media entry creation task
   * 
   * @param array   $args       Parameters to give to the task
   * @return Vikinger_Task
   */
  function vikinger_file_create_media_entry_task($args = []) {
    $task_execute = function ($args, $uploaded_file_data) {
      $result = vkmedia_create_media($uploaded_file_data);

      return $result;
    };

    $task_rewind = function ($args, $media_id) {
      $result = vkmedia_delete_media($media_id);

      return $result;
    };

    $task = new Vikinger_Task($task_execute, $task_rewind, $args);

    return $task;
  }
}

if (!function_exists('vikinger_upload_max_size_get')) {
  /**
   * Returns server maximum upload file size in Megabytes (php.ini - upload_max_filesize)
   * 
   * @return int $upload_max_filesize_mb      Maximum upload file size in Megabytes.
   */
  function vikinger_upload_max_size_get() {
    $upload_max_filesize = wp_max_upload_size();

    $upload_max_filesize_mb = $upload_max_filesize / (1024 * 1024);

    return $upload_max_filesize_mb;
  }
}

?>