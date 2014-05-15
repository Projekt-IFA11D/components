$( "a[href^=#]" ).on('click', function(e) {
	var href = $(this).attr('href');
	href = href.substring(1);
	$("li").removeClass('active');
	$(this).parent().addClass('active');
	e.stopPropagation();
	$.ajax({
		url: "ajax.php?page="+href,
		cache: false
	})
	.done(function( html ) {
		$( ".main" ).html( html );
	});
	e.preventDefault();
});

// Quick Search
$(document).ready(function() {
        $("#srch-term").keyup(function () {
            var data = this.value.split(" ");
            var jo = $(".table").find("tr");
            if (this.value == "") {
                      jo.show();
                      return;
            }
      $(".table tr:not(:first-child)").hide(); 

      jo.filter(function (i, v) {
                      var $t = $(this);
                      for (var d = 0; d < data.length; ++d) {
                          if ($t.is(":contains('" + data[d] + "')")) {
                                return true;
                          }
                }
                return false;
            }).show();
        }).focus(function () {
            this.value = "";
            $(this).css({
               "color": "black"
            });
            $(this).unbind('focus');
        }).css({
           "color": "#C0C0C0"
        });
});
