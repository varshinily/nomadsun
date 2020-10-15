<!-- hero needs a background image on it -->
<a class="db hero min-vh-100 cover bg-center flex items-center justify-center link" style="<?php nice_background('hero_image') ?>" href="<?php the_permalink(); ?>">

  <div class="hero-content white tc ph3 ph4-l">
    <!-- our location title -->
    <h1 class="archivo hero-heading f2 f1-l bold ma0 ttu lh-title"><?php the_title(); ?></h1>

    <!-- our subheading -->
    <?php if( get_field('subhead') ): ?>
      <p class="tenor hero-subhead f2 f1-l mb5 mb6-l mt0 white ttu lh-title"><?php the_field('subhead'); ?></p>
    <?php endif; ?>

    <!-- our formatted date -->
    <?php if( get_field('date') ): ?>
      <p class="archivo f6 bold ma0 white ttu tracked">
        <?php nice_date(get_field('date')) ?>
      </p>
    <?php endif; ?>
  </div>
</a>
