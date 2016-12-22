/**
 * navigation.js
 */
(function($) {

	var maxPages = flaskVars.maxPages;
	var startPage = flaskVars.startPage;
	var prevLink = flaskVars.prevLink;
	var nextLink = flaskVars.nextLink;
	var navNextString = flaskVars.navNextString;
	var navPrevString = flaskVars.navPrevString;
	var commentErrorString = flaskVars.commentErrorString;
	var commentModerationString = flaskVars.commentModerationString;
	var commentSuccessString = flaskVars.commentSuccessString;
	var moreCommentsString = flaskVars.moreCommentsString;
	
	$(document).ready(function () {
		siteLayout();
		waypointRules();
		ajaxBlog();
		ajaxCommentAdd();
		ajaxCommentScroll();
		formAllowedTags();
		$("#button-block .menu-button").moveTheElement('#page', $('#main-menu').innerWidth() + 4 );
		$("#tothetop").toTheTop();
		$(".social-media-buttons a").shareLinkInPopup();
		
		$(window).resize(function() {			//rules for when things get resized
			siteLayout();
		});
	});
	
	//site layout
	function siteLayout() {
		adminHeight = $("#wpadminbar").height();
		$("#main-menu").css({'top' : adminHeight + 0 });
		if ( $(".site-branding").is(":visible") ) $(".site-logo").css({ 'max-height' : $(".site-branding").innerHeight() * .88 });
		if ( ( $("#page").width() <= 745 ) && ( $(".site-branding").is(":visible") ) ) {
			$(".site-logo").hide();
		} else {
			$(".site-logo").show();
		}
	}

	//waypoint rules
	function waypointRules() {
		$("#tothetop").css({ 'display' : 'none' });
		
		$('html').waypoint({
			handler: function(direction) {
				if (direction == "down") {
					$('#tothetop').fadeIn();
				} else if (direction == "up") {
					$('#tothetop').fadeOut();
				}
			},
			offset: ( ( $(window).height() - $("#wpadminbar").outerHeight() ) ) * -1
		});
	}
	
	function ajaxBlog() {
		//adds the previous and next links to the bottom of the page
		$(".posts-navigation").append('<div class="nav-previous"><a href="' + prevLink + '">' + navPrevString + '</a></div><div class="nav-next"><a href="' + nextLink + '">' + navNextString + '</a></div>');

		var navPrev = $(".posts-navigation .nav-previous a");
		var navNext = $(".posts-navigation .nav-next a");
		var postsContainer = $("#main");
		var currentPage = startPage;
		var loadLink;
		var theContent;
		
		//makes sure that the links only show up when they have something to do
		navLinksShowHide();
		
		//listener for click to go to older posts
		navPrev.click(function (e) {
			e.preventDefault();
			goToPage('prev');
		});
		
		//listener for click to go to newer posts
		navNext.click(function (e) {
			e.preventDefault();
			goToPage('next');
		});
		
		//Sets up the current page, the link to the page to load, the next page, and the previous page
		//Then runs the functions that update the nav links and the page content
		function goToPage( direction ) {
			//Determines in which direction the numbers should run
			if ( direction == 'prev' ) {
				if ( currentPage < maxPages ) currentPage++;
			} else {
				if ( currentPage > 1 ) currentPage--;
			}
			loadLink = prevLink.replace(/\/page\/[0-9]?/, '/page/'+ currentPage);
			if ( currentPage < maxPages ) prevLink = prevLink.replace(/\/page\/[0-9]?/, '/page/' + (currentPage + 1) );
			if ( currentPage > 1 ) nextLink = prevLink.replace(/\/page\/[0-9]?/, '/page/' + (currentPage - 1) );
			
			updatePostsContainer();
			updateNavLinks();
		}
		
		function navLinksShowHide() {
			if ( currentPage == 1 ) {
				navNext.parent().fadeOut();
			} else {
				navNext.parent().fadeIn();
			}
			if ( currentPage == maxPages ) {
				navPrev.parent().fadeOut();
			} else {
				navPrev.parent().fadeIn();
			}
		}
		
		//sets the correct nav-previous and nav-next links
		//hides links if there are no more posts to show
		function updateNavLinks() {
			$(".posts-navigation .nav-previous a").attr('href', prevLink);
			$(".posts-navigation .nav-next a").attr('href', nextLink);
			navLinksShowHide();
		}

		//updates the posts container
		function updatePostsContainer() {
			var i;
			var postsHeight = postsContainer.css('height');
			fireLoadingAnimation('on');
			postsContainer.html('<div id="posts-placeholder" style="height:' + postsHeight + ';">&nbsp;</div>');
			$.get(loadLink, function (d) {
				i = $(d).find("#main");
				postsContainer.hide().html(i).fadeIn();
				fireLoadingAnimation('off');
				$("html, body").delay(800).animate({ scrollTop: 0 }, 800);
			});
		}
	}
	//lets you submit comments via ajax
	function ajaxCommentAdd() {
		var commentForm = $("#commentform");
		var formData;
		var formURL;
		
		commentForm.prepend('<div id="commentstatus"></div>');
		
		var commentStatus = $("#commentstatus");
		
		//listens for submission
		commentForm.submit(function (e) {
			e.preventDefault();
			formData = commentForm.serialize();
			formURL = commentForm.attr('action');

			fireLoadingAnimation('on');
			ajaxSubmit();
		});
		
		function ajaxSubmit() {
			$.ajax({
				type : 'post',
				url : formURL,
				data : formData,
				error : function (XMLHttpRequest, textStatus, errorThrown) {
						updateCommentStatus(commentErrorString, 'comment-error');
				},
				success : function (data, textStatus) {
					if (textStatus === 'success' ) {
						if (data == 0) {
							updateCommentStatus(commentModerationString, 'comment-moderation');
						} else if (data == 1) {
							updateCommentStatus(commentSuccessString, 'comment-success');
							if ( $("#comments .comment-list").length > 0 ) {
								//$("#comments .comment-list").delay(500).load(window.location.href + ' #comments .comment-list .comment.depth-1');
								$.get(window.location.href, function (d) {
									var i = $(d).find("#comments").html();
									$("#comments").delay(500).html(i);
									formAllowedTags();
									commentForm.unbind();
									ajaxCommentAdd();
									ajaxCommentScroll();
								});
							} else {
								$("#comments").prepend('<ol class="comment-list"></ol>').children(".comment-list").delay(500).load(window.location.href + ' #comments .comment-list .comment.depth-1');
							}
						} else {
							updateCommentStatus(commentErrorString, 'comment-error');
						}
					}
				},
				complete : function () {
					fireLoadingAnimation('off');
					resetForm( commentForm );
				}
			});
		}
		
		function updateCommentStatus(string, theClass) {
			if ( string.length > 0 ) commentStatus.html(string);
			if ( theClass.length > 0 ) commentStatus.removeClass().addClass(theClass);
		}
		
		function resetForm( form ) {
			form.find('input:text, input:password, input:file, select, textarea').val('');
			form.find('input:radio, input:checkbox').removeAttr('checked').removeAttr('selected');
		}
	}
	
	function ajaxCommentScroll() {
		var moreComments;
		var moreCommentsID = "more-comments";
		var navPrevious;
		var maxCommentPages;
		var currentCommentPage;
		
		//Gets the number of comments pages
		if ( $("#comment-nav-below .nav-previous a").length > 0 ) {
			navPrevious = $("#comment-nav-below .nav-previous a").attr('href');
			maxCommentPages = navPrevious.match(/comment-page-\d(?=\/)*/ig).toString().replace('comment-page-', '');
			maxCommentPages = parseInt(maxCommentPages) + 1;
			currentCommentPage = maxCommentPages;
		} else {
			return;
		}
		
		//removes the non-javascript comments nav and adds our own below the comments
		if ( $(".comment-navigation").length > 0 ) {
			$("#comment-nav-below").after('<nav id="' + moreCommentsID + '" class="comment-navigation-ajax">' + moreCommentsString + '</nav>');
			$(".comment-navigation").hide();
			moreComments = $("#more-comments");
		} else {
			return;
		}
		
		moreComments.click(function () {
			if (currentCommentPage > 0 ) currentCommentPage -= 1;
			loadNextComments();
		});
				
		function loadNextComments() {
			fireLoadingAnimation('on');
			var loadLink = navPrevious.toString().replace('comment-page-' + (maxCommentPages - 1).toString(), 'comment-page-' + currentCommentPage.toString() );
			$.get(loadLink, function (d) {
				i = $(d).find("ol.comment-list .comment.depth-1");
				$("ol.comment-list").append(i);
				fireLoadingAnimation('off');
				if (currentCommentPage == 1 ) moreComments.fadeOut();
			});
		}		
	}
	
	//loading animations for ajax elements
	//fireLoadingAnimation turns it on and off.
	function fireLoadingAnimation ( onOff ) {
		var bodyelem = $(document);
		
		if (  onOff == 'on'  ) {
			$("#loading-animation").css({
				'position' : 'fixed',
				'top' : $(window).height() / 2 - 100,
				'left' : $(window).width() / 2 - 100
			});
			//$("#loading-animation").show();
			$("#curtain").fadeIn(500);
		} else {
			$("#curtain").fadeOut();
		}
	}

	//takes the page back to the top
	$.fn.toTheTop = function() {
		this.click(function(e){
			e.preventDefault();
			$("html, body").animate({ scrollTop: 0 }, 800);
		});
		return this;
	}
	
	//moves the main body of the site to reveal the menu
	$.fn.moveTheElement = function ( elementToMove, howFar ) {
		var that = this;
		
		//listens for a click of the menu button
		this.click(function (e) {
			moveActual();
		});
		//listens for the escape key
		$(window).keyup(function (e) {
			if (e.keyCode == 27) {
				if ( $(elementToMove).css( 'left' ) != '0px' ) moveActual();
			}
		});
		//listens for swipe on mobile
		$(window).on('swipeleft', function (e) {
			if ( $(elementToMove).css( 'left' ) == '0px' ) moveActual();
		}).on('swiperight', function () {
			if ( $(elementToMove).css( 'left' ) != '0px' ) moveActual();
		});
		//does the actual work
		function moveActual() {
			var i = 0;
			if ( $(elementToMove).css( 'left' ) == '0px' ) i = howFar * -1;
			$(elementToMove).animate({ left : i });
		}
		return this;
	}
	
	//shows allowed tags in the comment reply form on hover
	function formAllowedTags() {
		$("#form-allowed-tags").hide();
		$(".form-allowed-tags-help").remove();
		$(".comment-form-comment label").not(".woocommerce .comment-form-comment label").after('<span class="form-allowed-tags-help genericon genericon-help"></span>');
		$(".form-allowed-tags-help").hover(function () {
			$("#form-allowed-tags").fadeIn("slow");
		},
		function () {
			$("#form-allowed-tags").fadeOut("slow");		
		});
	}
	
	//opens share links in popup
	$.fn.shareLinkInPopup = function() {
		$(this).click(function(e){
			e.preventDefault();
			window.open (this.href, 'child', 'height=300,width=700'); 
		});
		return this;			
	}
	
	//shows width
	function pageWidth() {
		$('body').prepend('<div id="pagewidth"></div>');
		$("#pagewidth").css({
			'position' : 'fixed',
			'left' : '.5em',
			'top' : 18 + $("#wpadminbar").height(),
			'padding' : '0.25em',
			'font-size' : '.75em',
			'color' : '#eee',
			'background-color' : '#000',
			'opacity' : '0.7',
			'z-index' : '9999'
		})
		.html( $(window).outerWidth() + 'px' );

		$(window).resize(function() {			//rules for when things get resized
			$("#pagewidth").html( $(window).outerWidth() + 'px' );
		});
		
	}
	
})( jQuery );