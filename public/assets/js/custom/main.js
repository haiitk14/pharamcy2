var sendData = function( type, url, data, funcCallBack) {
    $.ajax({
        type: type, // POST, GET, PUT
        url: url, 
        data: data, // data format json
    }).done(function(result) {
        console.log(result);
        funcCallBack(result);
    }).fail(function(response) {
        var errors = $.parseJSON(response.responseText);
        $.each(errors.errors, function(index, value) {
            toastr.error(value);
        });
    }).always(function() {});
}
    
var print = function(elm) {
    var divToPrint=document.getElementById(elm);
    var newWin=window.open('','Print-Window');
    newWin.document.open();
    newWin.document.write('<html><head><style> table th { border: 1px solid #dee2e6; } table td { border: 1px solid #dee2e6; } div span { margin-left: 30px; } </style></head><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    setTimeout(function(){newWin.close();},10);
}

var DOCSO = function() {
    var t = ["không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín"],
        r = function(r, n) {
            var o = "",
                a = Math.floor(r / 10),
                e = r % 10;
            return a > 1 ? (o = " " + t[a] + " mươi", 1 == e && (o += " mốt")) : 1 == a ? (o = " mười", 1 == e && (o += " một")) : n && e > 0 && (o = " lẻ"), 5 == e && a >= 1 ? o += " lăm" : 4 == e && a >= 1 ? o += " tư" : (e > 1 || 1 == e && 0 == a) && (o += " " + t[e]), o
        },
        n = function(n, o) {
            var a = "",
                e = Math.floor(n / 100),
                n = n % 100;
            return o || e > 0 ? (a = " " + t[e] + " trăm", a += r(n, !0)) : a = r(n, !1), a
        },
        o = function(t, r) {
            var o = "",
                a = Math.floor(t / 1e6),
                t = t % 1e6;
            a > 0 && (o = n(a, r) + " triệu", r = !0);
            var e = Math.floor(t / 1e3),
                t = t % 1e3;
            return e > 0 && (o += n(e, r) + " nghìn ", r = !0), t > 0 && (o += n(t, r)), o
        };
    return {
        doc: function(r) {
            if (0 == r) return t[0];
            var n = "",
                a = "";
            do ty = r % 1e9, r = Math.floor(r / 1e9), n = r > 0 ? o(ty, !0) + a + n : o(ty, !1) + a + n, a = " tỷ"; while (r > 0);
            return n.trim() + " đồng";
        }
    }
}();
// number.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})
