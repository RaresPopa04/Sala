import { minusSets,minusExercise,minusDay } from "./eliminare-info.js";
const divDeSters = document.querySelector('.pentruStersDinBaza');

function functionalityToPlusForExercises()
    {
        const plusEx = document.querySelectorAll('.plus-ex');
        plusEx.forEach((element) => {
            element.addEventListener('click',()=>
            {
                const idZi = element.classList[0].split('-')[1];
                createExercise(idZi);

            },)
        })
    }
function functionalityToPlusForDays()
    {
        
        const pluszile = document.querySelector('.plus-principal');
        pluszile.addEventListener('click',()=>
            {
                const zilePanaAcum = document.querySelectorAll('.container-zile');
                if(zilePanaAcum.length===0)
                {
                    const containerFaraZile  = document.querySelector('.container-fara-cont');
                    if(containerFaraZile!=undefined)
                    {
                        containerFaraZile.remove();
                    }
                }
                var ultimaZi = document.querySelectorAll('.container-zile');
                ultimaZi = ultimaZi[ultimaZi.length-1];
                var elem = document.createElement('div');
                const uniqueIDZi = Date.now();
                elem.classList.add("container-zile");
                elem.classList.add(`container-zi-${uniqueIDZi}`);
                elem.classList.add(`nou`);
                elem.innerHTML =  `
                <div class="sectiune">
                    <div class="subtitlu">
                        <div class ="titlu-zi">
                        <div class = "grupare-operatii">
                            <div class="minus-${uniqueIDZi} minus-zi"><i class="fa fa-trash" aria-hidden="true"></i></div>
                        </div>
                        Ziua
                        <input type = "text" name = "input-zi-${uniqueIDZi}-nou" value = "" placeholder = "Nume zi ..."></div>
                    </div>
                    <div class="rand">
                        <div class="col cap-tabel">
                            <div class="plus-${uniqueIDZi} plus-ex"><i class="fa fa-plus-circle" aria-hidden="true"></i></div>
                            <div class ="titlu-sectiune">Exercitiu</div>
                        </div>
                        <div class ="grupare">
                            <div class="col cap-tabel">
                                <div class ="titlu-sectiune">Greutate</div>
                            </div>
                            <div class="col cap-tabel">
                                <div class ="titlu-sectiune">Repetari</div>
                            </div>  
                        </div>
                    </div>  
                </div>
                <div class ="linie"></div>
                
                `
                if(ultimaZi==null)
                {
                    const containerZile = document.querySelector('.zile');
                    containerZile.appendChild(elem);
                    const atentioanare = containerZile.querySelector('.atentionare');
                }
                else
                {
                    ultimaZi.after(elem);
                }
                const plusEx = document.querySelectorAll('.plus-ex');
                const buttonPlusUltim = plusEx[plusEx.length-1];
                buttonPlusUltim.addEventListener('click',()=>
                {
                    const idZi = buttonPlusUltim.classList[0].split('-')[1];
                    createExercise(idZi);
        
                })
                const minus = document.querySelector(`.minus-${uniqueIDZi}`);
                minusDay(minus,divDeSters);
            },)
            
            
    }
function functiolaityToPlusSets()
{
    const plusButoane = document.querySelectorAll('.plus-serii');
    plusButoane.forEach(element => {
        element.addEventListener('click',()=>
        {
            var idEx = element.classList[1].split('-')[2];
            createSet(idEx);

        })
        
    });
}
functionalityToPlusForExercises();
functionalityToPlusForDays();
functiolaityToPlusSets();

function createSet(idDeCreat)
{
    const containerPtSerii = document.querySelector(`.rand-${idDeCreat}`);
    const colGreutate = containerPtSerii.querySelector('.greutati');
    const colRepetari = containerPtSerii.querySelector('.repetari');

    
    const uniqueId = Date.now()

    const elemGreutate = document.createElement('div');
    elemGreutate.style = "margin-top:5px;";
    elemGreutate.innerHTML= `<input type="text" class = "greutate-${uniqueId} greutate-${idDeCreat} nou" name="greutate-${uniqueId}-nou-${idDeCreat}" value="">`

    const containerCuMinus = document.createElement('div');
    containerCuMinus.classList.add('container-cu-minus');

    const elemRepetari = document.createElement('div');
    elemRepetari.style = "margin-top:5px;";
    elemRepetari.innerHTML= `<input type="text" class = "repetari-${uniqueId} repetari-${idDeCreat}"name="repetare-${uniqueId}-nou-${idDeCreat}" value="">`

    var minus = document.createElement('div');
    minus.classList.add('minus-serie');
    minus.classList.add(`minus-serie-${uniqueId}`);
    minus.classList.add(`nou`);
    minus.innerHTML='<i class="fa fa-times" aria-hidden="true"></i>';
    minusSets(minus,divDeSters);

    colGreutate.appendChild(elemGreutate);
    containerCuMinus.appendChild(elemRepetari);
    containerCuMinus.appendChild(minus);
    colRepetari.appendChild(containerCuMinus);
}
function createExercise(idZi)
{
    const containerCurent = document.querySelector(`.container-zi-${idZi}`);
    const rand = document.createElement('div');
    var idNou = Date.now();
    rand.classList.add(`rand`);
    rand.classList.add(`rand-${idNou}`);
    containerCurent.appendChild(rand);

    const col1 = document.createElement('div');
    col1.classList.add('col');
    col1.innerHTML = `
        <div class = "grupare-operatii" style="margin-top:5px">
            <div class="plus-serii plus-serii-${idNou}"><i class="fa fa-plus-square" aria-hidden="true"></i></div>
            <div class="minus-exercitiu minus-exercitiu-${idNou} nou"><i class="fa fa-trash" aria-hidden="true"></i></div>
        </div>
        <input type="text" value="" name="ex-${idNou}-nou-${idZi}">
    `;
    rand.appendChild(col1);
    const minusCurentEx = rand.querySelector('.minus-exercitiu');
    minusExercise(minusCurentEx,divDeSters);

    
    const grupare = document.createElement('div');
    grupare.classList.add('grupare');

    const col2 = document.createElement('div');
    col2.classList.add('col');
    col2.innerHTML = `
    <div class="col">
            <div class="greutati">
                <div style="margin-top: 5px;"><input type="text" class = "greutate-${idNou} greutate-${idNou} nou" name="greutate-${idNou}-nou-${idNou}" value=""></div>
            </div>
    </div>`;
    grupare.appendChild(col2);

    const col3 = document.createElement('div');
    col3.classList.add('col');
    col3.innerHTML = `
    <div class="col">
            <div class="repetari">
                <div class = "container-cu-minus">
                    <div style="margin-top: 5px;"><input type="text" class = "repetari-${idNou} repetari-${idNou}" name="repetare-${idNou}-nou-${idNou}" value=""></div>
                    <div class  = "minus-serie minus-serie-${idNou} nou">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
    </div>`
    
    grupare.appendChild(col3);
    rand.appendChild(grupare);
    const linie = document.createElement('div');
    linie.classList.add('linie');
    rand.appendChild(linie);
    const minusCurent = document.querySelector(`.minus-serie-${idNou}`);
    minusSets(minusCurent,divDeSters);

    const buton = document.querySelector(`.plus-serii-${idNou}`);

    buton.addEventListener('click',()=>
    {
        var idEx = buton.classList[1].split('-')[2];
        createSet(idEx);
    })
}