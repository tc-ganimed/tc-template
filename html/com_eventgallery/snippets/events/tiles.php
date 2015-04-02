<?php

/**
 * @package     Sven.Bluege
 * @subpackage  com_eventgallery
 *
 * @copyright   Copyright (C) 2005 - 2013 Sven Bluege All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
/**
 * @var JCacheControllerCallback $cache
 */
$cache = JFactory::getCache('com_eventgallery');
?>
<<<<<<< HEAD

=======
<script type="text/javascript">

    var eventgalleryEventsList;
    var eventgalleryLazyloader;
    var eventgalleryTilesCollection;

    window.addEvent("domready", function () {

        
            var options = {
                imagesetContainer: $$('.event-thumbnails')[0],
                imageset: $$('.event-thumbnail'),
                initComplete: function () {
                    eventgalleryLazyloader = new LazyLoadEventgallery({
                        range: 100,
                        elements: 'img.lazyme',
                        image: 'components/com_eventgallery/media/images/blank.gif',
                        onLoad: function (img) {
                            //console.log('image loaded');
                            setTimeout(function () {
                                img.setStyle('opacity', 0).fade(1);
                            }, 500);
                        }
                    });
                    var tilesOptions = {
                        tilesSelector: '.eventgallery-tiles .eventgallery-tile',
                        tilesContainerSelector: '.eventgallery-tiles'
                    };
                    eventgalleryTilesCollection = new EventgalleryTilesCollection(tilesOptions);
                    
                },
                resizeStart: function () {
                    $$('.event-thumbnails .event-thumbnail img').setStyle('opacity', 0);
                },
                resizeComplete: function () {
                    eventgalleryLazyloader.initialize();
                    window.fireEvent('scroll');
                }
            };
            // initialize the imagelist
            eventgalleryEventsList = new EventgalleryEventsTiles(options);
    });


</script>
<style>
.eventgallery-tiles-list .eventgallery-tile {
    width: 100%;
    visibility: visible;
    background: url('/templates/triumphcompetition/images/bgpng.php?preset=2');
    padding: 0;
    margin: 0 0 10px 0;
    }
div.eventgallery-tiles-list {
    margin-top: -15px;
}
div.eventgallery-tiles {
    margin: 0px;
}
.event-thumbnails {
    float: left;
    width: 30%;
}
.event-thumbnail {
    padding: 10px;
}
.content {
    float: left;
    width: 70%;
}
</style>
>>>>>>> fef9a7547372da1e227045a7d7be90137cf55e05
<div class="eventgallery-tiles-list">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <div class="page-header">
            <h1><?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
        </div>
    <?php endif; ?>

    <p class="greetings"><?php echo $this->params->get('greetings'); ?></p>


    <div class="eventgallery-tiles">
		<?php foreach($this->entries as $entry) :?>
			<?php $this->set('entry',$entry)?>
			<?php echo $this->loadSnippet('events/tiles_event'); ?>
		<?php endforeach?>
		<div style="clear:both"></div>
	</div>
	
	<form method="post" name="adminForm">

		<div class="pagination">
		<div class="counter pull-right"><?php echo $this->pageNav->getPagesCounter(); ?></div>
		<div class="float_left"><?php echo $this->pageNav->getPagesLinks(); ?></div>
		<div class="clear"></div>
		</div>
		
	</form>
	
</div>