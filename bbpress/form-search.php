<?php

/**
 * Search 
 *
 * @package bbPress
 * @subpackage Theme
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( bbp_allow_search() ) : ?>

  <!-- SECTION FILTERS BAR -->
  <div class="section-filters-bar v2 vikinger-forum-search-bar">
    <!-- SECTION FILTERS BAR ACTIONS -->
    <div class="section-filters-bar-actions full">
      <!-- BBP SEARCH FORM -->
      <div class="bbp-search-form form">
        <form role="search" method="get" id="bbp-search-form">
          <!-- FORM ROW -->
          <div class="form-row">
            <label class="screen-reader-text hidden" for="bbp_search"><?php esc_html_e( 'Search for:', 'bbpress' ); ?></label>
            <input type="hidden" name="action" value="bbp-search-request" />

            <!-- FORM ITEM -->
            <div class="form-item">
              <!-- FORM INPUT -->
              <div class="form-input small with-button">
                <label for="bbp_search"><?php esc_html_e('Search Forums', 'vikinger'); ?></label>
                <input type="text" value="<?php bbp_search_terms(); ?>" name="bbp_search" id="bbp_search" />
                <button class="button primary" type="submit" id="bbp_search_submit">
                <?php

                  /**
                   * Icon SVG
                   */
                  get_template_part('template-part/icon/icon', 'svg', [
                    'icon'  => 'magnifying-glass'
                  ]);

                ?>
                </button>
              </div>
              <!-- /FORM INPUT -->
            </div>
            <!-- /FORM ITEM -->
          </div>
          <!-- /FORM ROW -->
        </form>
      </div>
      <!-- /BBP SEARCH FORM -->

    <?php if (is_user_logged_in() && (bbp_get_forum_id() !== 0) && !bbp_is_forum_category()) : ?>
      <!-- BUTTON -->
      <a href="#new-topic-0" class="button secondary vikinger-create-discussion-button"><?php esc_html_e('+ Create Discussion', 'vikinger'); ?></a>
      <!-- /BUTTON -->
    <?php endif; ?>

    <?php bbp_forum_subscription_link(); ?>
    </div>
    <!-- /SECTION FILTERS BAR ACTIONS -->
  </div>
  <!-- /SECTION FILTERS BAR -->

<?php endif;