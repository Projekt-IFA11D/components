function search_submit(caller) {
        var form = caller.closest('form');
        var ser = form.serialize();
        $.ajax({
                url: "ajax.php?search="+ser,
                cache: false
        })
        .done(function( html ) {
                $( ".main" ).html( html );
        });
}
