<?php
/**
 * The template part for displaying Employees.
 *
 */

$show_team   = get_post_meta( $post->ID, '_zinc_show_about_team', true ) === 'on' ? true : false;
$member_ids  = get_post_meta( $post->ID, '_zinc_about_team_members', true );

if ( $show_team ) : ?>
  <section class="about-team-section segment">
    <article class="about-team-content theme-background">
      <div class="about-team-content-inner">

      </div>
    </article>

    <?php if ( ! empty( $member_ids ) ) { find_medarbejder( $member_ids ); } ?>
  </section>
<?php endif;
