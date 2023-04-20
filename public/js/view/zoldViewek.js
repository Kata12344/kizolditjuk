import ZoldView from "./zoldView.js";

class ZoldViewek {
    #tomb;
    constructor(tomb, szuloElem) {
        this.#tomb = tomb;
        szuloElem.append(`
        <article>
        <form id="zoldes" name="zoldes" >
        <label for="osztaly" >Válassz osztályt!</label>
        <select name="osztaly" id="osz" class="form-select" >
            <option value="nSZF1B">nSZF1B</option>
            <option value="nSZF2A">nSZF2A</option>
            <option value="nVUU1">nVÜÜ1</option>
            <option value="nVUU2">nVÜÜ2</option>
        </select>
        <label for="tevekenyseg">Válassz tevékenységet!</label>
        <select name="tevekenyseg" id="tev" class="form-select" >
            <option value="kerek">Kerékpárral jöttem</option>
            <option value="roll">Rollerrel jöttem iskolába</option>
            <option value="fa">Ültettem fát</option>
            <option value="vir">Ültettem virágot</option>
        </select>
        <input type="button" id="elkuld" value="Elküld">
        </form>
        <table>
        <thead>
        <tr>
            <th scope="col">Osztály</th>
            <th scope="col">Tevékenység</th>
            <th scope="col">Pont</th>
            <th scope="col">Státusz</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        </table>
        </article>
        `);

        this.sorElem = szuloElem.children("article:last-child");
        this.tbodyElem = this.sorElem.children("tbody")

        tomb.forEach(elem => {
            new ZoldView(elem, this.tbodyElem);
        });
        

        this.elkuldElem = $(`#elkuld`);
        this.elkuldElem.on("click", () => {
            this.adatGyujtes();
            this.kattintastrigger("elkuld");
            
        });
        
    }
kattintastrigger(esemenyNeve) {
            const esemeny = new CustomEvent(esemenyNeve, {
                detail: this.#tomb,
            });
            window.dispatchEvent(esemeny);
        }
    adatGyujtes() {
        this.osztalyElem = $("#osz").find(":selected").val();
        this.tevElem = $("#tev").find(":selected").val();
    }
}
export default ZoldViewek;
