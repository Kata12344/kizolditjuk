class ZoldView{
    constructor(elem, szuloElem){
        console.log(elem)
        szuloElem.append(`
            <tr>
                <td>${elem.osztaly_id}</td>
                <td>${elem.tevekenyseg_nev}</td>
                <td>${elem.pontszam}</td>
                <td>${elem.allapot}</td>
            </tr>
        `);
        //this.formElem = szuloElem.children("form");
        
    }

}
export default ZoldView;