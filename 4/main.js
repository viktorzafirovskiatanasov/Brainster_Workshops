$(document).ready(function () {
    $("#submit").click(function () {
        const p1 = parseInt($("#p1").val());
        const p2 = parseInt($("#p2").val());
        const p3 = parseInt($("#p3").val());

        $("#p1_q").text(p1);
        $("#p2_q").text(p2);
        $("#p3_q").text(p3);

        if ((p1 != null || p1 != "") && $("#p1_q").text() !== "") {
            $("#p1_t").text(p1 * 100);
            $("#p1_q").parent().show();
        }
        if ((p2 != null || p2 != "") && $("#p2_q").text() !== "") {
            $("#p2_t").text(p2 * 140);
            $("#p2_q").parent().show();
        }
        if ((p3 != null || p3 != "") && $("#p3_q").text() !== "") {
            $("#p3_t").text(p3 * 200);
            $("#p3_q").parent().show();
        }

        $("#total").text(p1 * 100 + p2 * 140 + p3 * 200);
        $("#total").parent().show();
    });
});
