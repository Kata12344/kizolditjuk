import AdatModel from "../model/adatModel.js";
import ZoldViewek from "../view/zoldViewek.js";

class PublicController{
    constructor(){
        const token = $('meta[name="csrf-token"]').attr("content");
        const adatmodel = new AdatModel(token);
        adatmodel.adatBe("/bejgy_tev", this.adatok);

        $(window).on("elkuld", (event)=>{
            //console.log(event.detail)
            adatmodel.adatUj("/bejegyzes", this.adatok);
            
        });
    }

    adatok(tomb){
        const szuloElem =$('main');
        new ZoldViewek(tomb, szuloElem)
       
    }
}
export default PublicController;