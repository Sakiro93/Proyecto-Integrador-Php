function getBilletes(vuelto) {
   
    var billetes = "";
    var b = 0;
    //echo unidades[1];
    while (vuelto > 0) {
        if (vuelto >= 100) {
            b = parseInt(vuelto / 100);
            vuelto = vuelto % 100;
            billetes = billetes + " " + b+ " Billetes de $100";
        } else
        if (vuelto >= 50) {
            b = parseInt(vuelto / 50);
            vuelto = vuelto % 50;
            billetes = billetes + " " + b + " Billetes de $50" ;

        } else
        if (vuelto >= 20) {
            b = parseInt(vuelto / 20);
            vuelto = vuelto % 20;
            billetes = billetes + " " + b +" Billetes de $20";
        } else
        if (vuelto >= 10) {
           b = parseInt(vuelto / 10);
            vuelto = vuelto % 10;
            billetes = billetes + " " + b + " Billetes de $10";
        } else
        if (vuelto >= 5) {
            b = parseInt(vuelto / 5);
            vuelto = vuelto % 5;
            billetes = billetes + " " + b+ " Billetes de $5";
        } else{
             billetes = billetes + " " + vuelto+" Billetes de $1";
             vuelto = 0;
        }

    }
    return billetes;
}