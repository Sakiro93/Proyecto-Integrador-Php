function getLetras(vuelto) {
    var unidades = ['Uno', 'Dos', 'Tres', 'Cuatro', 'Cinco', 'Seis', 'Siete', 'Ocho', 'Nueve'];
    var diezveinte = ['Diez', 'Once', 'Doce', 'Trece', 'Catorce', 'Quince', 'Dieciseis', 'Diecisiete', 'Dieciocho', 'Diecinueve', 'Veinte'];
    var decenas = ['Diez', 'Veinti', 'Treinta', 'Cuarenta', 'Cincuenta', 'Sesenta', 'Setenta', 'Ochenta', 'Noventa'];
    var centenas = ['Cien', 'Doscientos', 'Trescientos', 'Cuatrocientos', 'Quinientos', 'Seiscientos', 'Setecientos', 'Ochocientos', 'Novecientos'];
    var miles = ["Mil", "Dos Mil", "Tres Mil", "Cuatro Mil", "Cinco Mil", "Seis Mil", "Siete Mil", "Ocho Mil", "Nueve Mil"];

    var letras = "";
    var b = 0;
    //echo unidades[1];
    while (vuelto >= 1) {
        if (vuelto >= 1000) {
            b = parseInt(vuelto / 1000);
            vuelto = vuelto % 1000;
            letras = letras + " " + miles[b - 1];
        } else
        if (vuelto >= 100) {
            var aux = vuelto;
            b = parseInt(vuelto / 100);
            vuelto = vuelto % 100;
            letras = letras + " " + ((b == 1 && vuelto > 0) ? " Ciento " : centenas[b - 1]);

        } else
        if (vuelto >= 20) {
            b = parseInt(vuelto / 10);
            vuelto = vuelto % 10;
            if (vuelto == 0)
                letras = letras + " " + ((b == 2) ? " Veinte " : decenas[b - 1]);
            else
                letras = letras + " " + ((b == 2) ? decenas[b - 1] : decenas[b - 1] + " y ");

        } else
        if (vuelto >= 10) {
            letras = letras + " " + diezveinte[vuelto - 10];
            vuelto = 0;
        } else
        if (vuelto > 0) {
            letras = letras + " " + unidades[vuelto - 1];
            vuelto = 0;
        }

    }
    return letras;
}
