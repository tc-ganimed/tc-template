<?php 

$link = JRoute::_("index.php?option=com_eventgallery&view=event&folder=".$this->entry->getFolderName()."&Itemid=".$this->currentItemid);

?>

<div class="eventgallery-tile">
	<div class="wrapper">
		<a href="<?php echo $link ?>">
			<div class="event-thumbnails">
				<?php
		            $files = $this->eventModel->getEntries($this->entry->getFolderName(), -1, 1, 1);
				?>
				
				<?php
		            /**
		            * @var EventgalleryLibraryFile $file
		            */?>

					<div class="event-thumbnail">
<<<<<<< HEAD
						<?php IF ($this->params->get('hide_mainimage_for_password_protected_event', 0) == '1' && !$this->entry->isAccessible()): ?>
							<img class="locked-event" data-width="1000" data-height="1000" src="<?php echo JURI::root(true)?>/media/com_eventgallery/frontend/images/locked.png">
						<?php ELSE: ?>
							<?php if (isset($files[0])) echo $files[0]->getThumbImgTag(200,133, "", false); ?>	
						<?php ENDIF; ?>
					</div>													
=======
						<?php if (isset($files[0])) echo $files[0]->getLazyThumbImgTag(200,150, "", false); ?>	
					</div>											
>>>>>>> fef9a7547372da1e227045a7d7be90137cf55e05
			</div>
			<div class="content">				
				<div class="data">
					<?php IF($this->params->get('show_date',1)==1):?><div class="date"><small class="muted"><?php echo JHTML::Date($this->entry->getDate());?></small></div><?php ENDIF ?>
<<<<<<< HEAD
					<div class="title"><h2><?php echo $this->entry->getDisplayName();?></h2></div>
=======
					<div class="title"><h2><?php echo $this->entry->getDescription();?></h2></div>
>>>>>>> fef9a7547372da1e227045a7d7be90137cf55e05
					<?php IF($this->params->get('show_text',1)==1):?><div class="text"><?php echo JHtml::_('content.prepare', $this->entry->getIntroText(), '', 'com_eventgallery.events'); ?></div><?php ENDIF ?>
					<?php IF($this->params->get('show_imagecount',1)==1):?><div class="imagecount"><small class="muted"><?php echo JText::_('COM_EVENTGALLERY_EVENTS_LABEL_IMAGECOUNT') ?> <?php echo $this->entry->getFileCount();?></small></div><?php ENDIF ?>
					<?php IF($this->params->get('show_eventhits',0)==1):?><div class="eventhits"><small class="muted"><?php echo JText::_('COM_EVENTGALLERY_EVENTS_LABEL_HITS') ?> <?php echo $this->entry->getHits();?></small></div><?php ENDIF ?>				
					<?php IF ($this->entry->isCommentingAllowed() && $this->params->get('use_comments')==1 && $this->params->get('show_commentcount',1)==1):?><div class="comment"><small class="muted"><?php echo JText::_('COM_EVENTGALLERY_EVENTS_LABEL_COMMENTCOUNT') ?> <?php echo $this->entry->getCommentCount();?></small></div><?php ENDIF ?>
					<div style="clear:both"></div>
				</div>

			</div>					
		</a>
	</div>	
</div>