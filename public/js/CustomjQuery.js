$(document).ready(function (e) {
    // Desktop Search
    // ====================================================================
    $("#DesktopSearch").click(function () {
        $("#ShowDesktopSearch").toggle();
        $(".docs").addClass("blur-sm");
        $(".content").addClass("blur-sm");
        //  $("#ShowDesktopSearch").fadeIn(100);
    });

    // hide Desktop Search box on x click
    $("#CloseDesktopSearch").click(function () {
        $("#ShowDesktopSearch").hide();
        $(".docs").removeClass("blur-sm");
        $(".content").removeClass("blur-sm");
    });

    // hide desktop search on outside click
    $(document).click(function (e) {
        if (
            e.target.id == "ShowDesktopSearch" &&
            e.target.style.display != "none"
        ) {
            $("#ShowDesktopSearch").hide();
            $(".docs").removeClass("blur-sm");
            $(".content").removeClass("blur-sm");
        }
    });
    // Desktop Search End
    // ======================================================================

    // Mobile Search
    // ====================================================================
    $("#MobileSearch").click(function () {
        $("#ShowMobileSearch").toggle();
        $("#docs").addClass("blur-sm");
        $(".content").addClass("blur-sm");
    });

    // hide Mobile Search box on x click
    // $("#CloseMobileSearch").click(function () {
    //     $("#ShowMobileSearch").hide();
    //     $("#docs").removeClass("blur-sm");
    //     $(".content").removeClass("blur-sm");
    // });

    // hide Mobile search on outside click
    // $(document).click(function (e) {
    //     //alert(e.target.id);
    //     if (e.target.id != "MobileSearch" && e.target.style.display != "none") {
    //         $("#ShowMobileSearch").hide();
    //         $(".docs").removeClass("blur-sm");
    //         $(".content").removeClass("blur-sm");
    //     }
    // });

    $(document).click(function (e) {
        if (
            e.target.id == "ShowDesktopSearch" &&
            e.target.style.display != "none"
        ) {
            $("#ShowDesktopSearch").hide();
            $(".docs").removeClass("blur-sm");
            $(".content").removeClass("blur-sm");
        }
    });

    // Mobile Search End
    // ======================================================================
});
