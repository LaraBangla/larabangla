$(document).ready(function (e) {
    // Desktop Search
    // ====================================================================
    $("#DesktopSearch").click(function () {
        $("#ShowDesktopSearch").toggle();
        //  $("#ShowDesktopSearch").fadeIn(100);
    });

    // hide Desktop Search box on x click
    $("#CloseDesktopSearch").click(function () {
        $("#ShowDesktopSearch").hide();
    });

    // hide desktop search on outside click
    $("#ShowDesktopSearch").click(function (e) {
        e.stopPropagation();
        // $(this).fadeOut(100);
        $(this).hide();
    });
    // Desktop Search End
    // ======================================================================
});
