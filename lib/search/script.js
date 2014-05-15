function search_submit() {
        var form = caller.closest('form');
        var ser = form.serialize();
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
        $.ajax({
                url: "ajax.php?search="+ser,
                cache: false
        })
        .done(function( html ) {
                $( ".main" ).html( html );
        });
}
