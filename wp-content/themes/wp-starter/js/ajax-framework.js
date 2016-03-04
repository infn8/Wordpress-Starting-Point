var simulateLag = 0;
jQuery(document).ready(function($) {
	$('body').on('click', 'a[data-content-target]', function(event) {
		var $this = $(this),
			hyperlink = $(this).attr('href'),
			doHistory = Modernizr.history && window.location.search.indexOf('noHistory') < 0,
			sameOrigin = isSameOrigin(hyperlink),
			contentTargetIsParent = $(this).data('target-is-ancestor') === true,
			contentTargetSel = $(this).data('content-target'),
			$target = contentTargetIsParent ? $($this.parents(contentTargetSel)[0]) : $(contentTargetSel);
			console.log("$target: ", $target);
		if (!sameOrigin) {
			return
		}
		if (doHistory) {
			history.pushState({contentTargetSel:contentTargetSel,contentTargetIsParent:contentTargetIsParent}, null, hyperlink);
			scrollToLocationTarget();
		}
		event.preventDefault();
		$target.addClass('ajax-loading');
		$.ajax({
			url: hyperlink,
			type: 'POST',
			dataType: 'html',
			data: {ajaxRequest: true},
		})
		.done(function(data, textStatus, jqXHR) {
			console.log("success");
			content = data.match(/<!--ajax-start-->([\s\S]*)(?=<!--ajax-stop-->)<!--ajax-stop-->/);
			html = content === null ? data : content;
			setTimeout(function(){
				$target.html(content[0]).removeClass('ajax-loading');
			}, simulateLag);
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			// console.log("complete");
		});
		return false;
	});

	scrollToLocationTarget();
});

function isSameOrigin(url) {

    var loc = window.location,
        a = document.createElement('a');

    a.href = url;

    return a.hostname == loc.hostname &&
           a.port == loc.port &&
           a.protocol == loc.protocol;
}

window.onpopstate = function(event) {
  console.log("location: " + document.location + ", state: " + JSON.stringify(event.state));
};
function scrollToLocationTarget(aniDur){
	aniDur = aniDur === undefined ? 'slow' : aniDur;
	$locationTarget = $('[data-container-for="'+window.location+'"]');
	console.log("$locationTarget: ", $locationTarget);
	if ($locationTarget.length) {
		console.log("$locationTarget.offset().top - $('.navbar-fixed-top').height(): ", $locationTarget.offset().top - $('.navbar-fixed-top').height());

		$("html, body").animate({
			scrollTop: $locationTarget.offset().top - $('.navbar-fixed-top').height() + "px"
		}, aniDur);


		// $(document).scrollTop($locationTarget.offset().top - $('.navbar-fixed-top').height())
	};

}