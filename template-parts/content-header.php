<!-- here we have our header -->
<!-- we make the header have flexbox on large screens -->
<div class="flex-l">
  <!-- our header image -->
  <!-- we make our header background have 100% width and then 60% width on large screens -->
  <div class="w-100 w-60-l vh-50 vh-100-l cover bg-center mb4" style="<?php nice_background('hero_image') ?>">
  </div>

  <!-- our header content -->
  <!-- by default we'll make our header content block have 100% width and then we change it to 40% at large screen sizes -->
  <div class="w-100 w-40-l flex items-center justify-center ph4 relative">

    <div class="tc">
      <!-- here we use absolute position for larger screens to put the date in the top center -->
      <p class="f6 b archivo mt0 mb5 ttu tracked absolute-l top-0-l left-0-l w-100-l pt5">
        <?php nice_date(get_field('date')) ?>
        <span class="line mt4"></span>
      </p>

      <!-- standard wordpress data -->
      <!-- we change the type scale for larger screens and squish the line height a bit because of the bigger font size -->
      <h1 class="f2 f1-l archivo mt0 mb2 ttu lh-title">
        <?php the_title(); ?>
      </h1>

      <p class="f2 f1-l tenor mt0 mb4 mb5-l ttu lh-title">
        <?php the_field('subhead'); ?>
      </p>

      <!-- specific to this component -->
      <p class="f4 cardo i measure">
        <?php the_sub_field('header_intro'); ?>
      </p>
    </div>
  </div>
</div>
