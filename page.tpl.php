<?php
// $Id: page.tpl.php 6635 2010-03-01 00:39:49Z chris $
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $setting_styles; ?>
  <!--[if IE 8]>
  <?php print $ie8_styles; ?>
  <![endif]-->
  <!--[if IE 7]>
  <?php print $ie7_styles; ?>
  <![endif]-->
  <!--[if IE 6]>
  <?php print $ie6_styles; ?>
  <![endif]-->
  <?php print $local_styles; ?>
  
<link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Carrois+Gothic|Archivo+Narrow' rel='stylesheet' type='text/css'/>
  
</head>

<?php
  $full="fullpage";
  if ( $sidebar_first || $sidebar_last ){
    $full="";
  }
?>

<body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?> <? echo $full; ?>">
  <div id="page" class="page">
    <div id="page-inner" class="page-inner">
      <div id="skip">
	<div id="language_holder"><?php print $language_switcher; ?></div>
        <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
      </div>

      <!-- header-top row: width = grid_width -->
      <?php print theme('grid_row', $header_top, 'header-top', 'full-width', $grid_width); ?>

      <!-- header-group row: width = grid_width -->
      <div id="header-group-wrapper" class="header-grosidebarup-wrapper full-width">
        <div id="header-group" class="header-group row <?php print $grid_width; ?>">
          <div id="header-group-inner" class="header-group-inner inner clearfix">
            <?php print theme('grid_block', theme('links', $secondary_links), 'secondary-menu'); ?>
            
			<?php if ($logo || $site_name || $site_slogan): ?>
			<div id="header-site-info" class="header-site-info block">
				<div id="header-site-info-inner" class="header-site-info-inner inner">
            <span id="slogan" class="slogan"><?php print $site_slogan; ?></span>
          
					<?php if ($logo): ?>
                    <div id="logo">
                        <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
                    </div>
                    <?php endif; ?>
                    
                    <?php if ($site_name || $site_slogan): ?>
                    <div id="site-name-wrapper" class="clearfix">
                        <?php if ($site_name): ?>
                            <span id="site-name"><a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></span>
                        <?php endif; ?>
                    </div><!-- /site-name-wrapper -->
                    <?php endif; ?>
				</div><!-- /header-site-info-inner -->
            </div><!-- /header-site-info -->
            <?php endif; ?>
            
			<div id="header-region" class="header-region block">
				<div id="header-region-inner" class="header-region-inner inner">
					<?php print $header; ?>
				</div><!-- /header-region-inner -->
			</div><!-- /header-region -->
          </div><!-- /header-group-inner -->
          
          <div id="nav-group" class="nav-group clearfix">
         		<?php // print theme('grid_block', $primary_links_tree, 'primary-menu'); ?>
         		<?php print $main_menu_tree; ?>
			</div><!--/nav-group-->
        </div><!-- /header-group -->
      </div><!-- /header-group-wrapper -->
   
      <!-- preface-top row: width = grid_width -->
		<?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>
		<div id="preface-top-wrapper" class="preface-top-wrapper full-width">
        	<div id="preface-top" class="preface-top row <?php print $grid_width; ?> clearfix">
    				<?php print theme('grid_block', $search_box, 'search-box'); ?>
          </div>
		</div>
    <div id="precontent" class="precontent-content grid16-16">
      <?php if ($precontent): ?>
        <?php print $precontent; ?>
      <?php endif; ?>
    </div><!-- /precontent -->
      
      <!-- main row: width = grid_width -->
      <div id="main-wrapper" class="main-wrapper full-width">
        <div id="main" class="main row <?php print $grid_width; ?>">
          <div id="main-inner" class="main-inner inner clearfix">
            <?php if ($sidebar_first): ?>
              <div id="sidebar-first-wrapper" class="section-collapsable">
                <div class="btn-collapse open"><span class="open"><?php print t('ocultar'); ?></span><span class="close"><?php print t('mostrar'); ?></span></div>
                <div class="btn-expand close"><span class="open"><?php print t('expand'); ?></span><span class="close"><?php print t('reduce'); ?></span></div>
                <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested', 'section', $sidebar_first_width); ?>
              </div>
            <?php endif; ?>

            <!-- main group: width = grid_width - sidebar_first_width -->
            <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
              <div id="main-group-inner" class="main-group-inner inner">
                <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>

                <div id="main-content" class="main-content row nested">
                  <div id="main-content-inner" class="main-content-inner inner">
                    <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                    <div id="content-group" class="content-group row nested section <?php print $content_group_width; ?>">
                      <div id="content-group-inner" class="content-group-inner inner">
                    

                        <?php if ($content_top || $help || $messages || $breadcrumb): ?>
                        <div id="content-top" class="content-top row nested">
                          <div id="content-top-inner" class="content-top-inner inner">
                            <?php print theme('grid_block', $help, 'content-help'); ?>
                            <?php print theme('grid_block', $messages, 'content-messages'); ?>
                            <?php print $content_top; ?>
                          </div><!-- /content-top-inner -->
                        </div><!-- /content-top -->
                        <?php endif; ?>

                        <div id="content-region" class="content-region row nested">

							<div id="content-region-inner" class="content-region-inner inner">
			                              <div class="b readcrumbs-wrapper">
                              <?php print theme('grid_block', $breadcrumb, 'breadcrumbs'); ?>  
                            </div>
                            <a name="main-content-area" id="main-content-area"></a>

                                <div id="content-inner" class="content-inner block">
                                    <div id="content-inner-inner" class="content-inner-inner inner">
                                    <?php if ($title/*&& !$is_front*/): ?>
                                        <h1 class="title"><?php print $title; ?></h1>
                                    <?php endif; ?>
                                    
                                    <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                                        <?php if ($content): ?>
                                            <div id="content-content" class="content-content">
                                            <?php print $content; ?>
                                            <?php print $feed_icons; ?>
                                            </div><!-- /content-content -->
                                        <?php endif; ?>
                                    </div><!-- /content-inner-inner -->
                                </div><!-- /content-inner -->
			     </div><!-- /content-region-inner -->
			</div><!-- /content-region -->
                                                
                        <?php if ($content_front_left || $content_front_right): ?>
                        <div id="content-front" class="content-front">
                            <div id="content-front-inner" class="content-front-inner inner">
                              <?php if ($content_front_left): ?>
                                <div id="content-front-left" class="content-front-left">
                                  <div class="content-inner">
                                  <?php print $content_front_left; ?>
                                  </div>    
                                </div>
                              <?php endif; ?>  
                              <?php if ($content_front_right): ?>
                                <div id="content-front-right" class="content-front-right">
                                  <div class="content-inner">  
                                  <?php print $content_front_right; ?>  
                                  </div>      
                                </div>
                              <?php endif; ?>  
                            </div> 
                        </div>    
                        <?php endif; ?>                        

                        <?php print theme('grid_row', $content_bottom, 'content-bottom', 'nested'); ?>
                      </div><!-- /content-group-inner -->
                    </div><!-- /content-group -->
                    <?php if ($sidebar_last): ?>
                      <div id="sidebar-last-wrapper" class="section-collapsable">
                        <div class="btn-collapse open"><span class="open"><?php print t('ocultar'); ?></span><span class="close"><?php print t('mostrar'); ?></span></div>
                        <?php print theme('grid_row', $sidebar_last, 'sidebar-last', 'nested', 'section', $sidebar_last_width); ?>
                      </div>
                    <?php endif; ?>

                  </div><!-- /main-content-inner -->
                </div><!-- /main-content -->

                <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
              </div><!-- /main-group-inner -->
            </div><!-- /main-group -->
          </div><!-- /main-inner -->
        </div><!-- /main -->
      </div><!-- /main-wrapper -->

      <!-- postscript-bottom row: width = grid_width -->
      <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>

      <!-- footer row: width = grid_width -->
      <?php if ($footer || $footer_message): ?>
			  <?php print theme('grid_row', $footer . $footer_message, 'footer', 'full-width', $grid_width); ?>
	    <?php endif; ?>

    </div><!-- /page-inner -->
  </div><!-- /page -->
  <?php print $scripts; ?>
  <?php print $closure; ?>
</body>
</html>
