$('.form-control').ready(function (e) {
    $('.calc').keyup(function () {
        var res = 0;
        $('.calc').each(function () {
            var achat = $('.achat').val();
            var marge = $('.marge').val();
            var resF = 0;
            var tva = $('.tva option:selected').text();
            var vente = $('.res').val();
            //      console.log('achat'+achat);
            //    console.log('marche'+marge);
            if ($.isNumeric(achat))
                res = Number(achat) + (Number(achat) * (Number(marge) / 100));

            resF = Number(vente) + (Number(vente) * (parseInt(tva) / 100));
            console.log('resF : ' + resF);
            $('.ventetva').val(resF);
        })
        $('.res').val(res);
    });
    $('.tva').change(function () {
        var res = 0;
        var taux = 0;
        var tva = $('.tva option:selected').text();
        var vente = $('.res').val();
        console.log('tva : ' + tva);
        console.log('vente : ' + vente);
        taux = Number(vente) * (parseInt(tva) / 100);
        res = Number(vente) + Number(taux);
        console.log('taux : ' + taux);
        console.log('taux : ' + (taux+vente));
        console.log('res : ' + res);
        $('.ventetva').val(res);

    });
});
// $('.form-control').on('input', '.calc', function () {
//     var sum = 0;
//     $('.form-control .calc').each(function () {
//         var inputVal = $(this).val();
//         if ($.isNumeric(inputVal))
//             //sum = sum + parseInt(inputVal);
//             alert(inputVal);
//     });
//     $('.res').val(inputVal);
// });