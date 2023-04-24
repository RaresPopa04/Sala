function functionalityToMinusForSets()
{
    const minusuri = document.querySelectorAll('.minus-serie');
    const divDeSters = document.querySelector('.pentruStersDinBaza');
    minusuri.forEach(element => {
        minusSets(element,divDeSters);

    });
}
function minusSets(element,divDeSters)
{
    element.addEventListener('click',()=>
    {
        const idMinus = element.classList[1].split("-")[2];
        const divGreutate = document.querySelector(`.greutate-${idMinus}`);
        const divRepetari = document.querySelector(`.repetari-${idMinus}`);
    
        const elemDeStersDinBaza = document.createElement('input');
        elemDeStersDinBaza.name = `sters-serie-${idMinus}`;
        elemDeStersDinBaza.type = "text";
        elemDeStersDinBaza.classList.add("deAscuns");
        if(element.classList[2]===undefined)
            divDeSters.appendChild(elemDeStersDinBaza);
        divRepetari.remove();
        divGreutate.remove();
        element.remove();

    })
}
function minusExercise(element,divDeSters)
{
    
    element.addEventListener('click',()=>{
        

        const idMinus = element.classList[1].split("-")[2];

        const Greutati = document.querySelectorAll(`.greutate-${idMinus}`);
        Greutati.forEach((greutate) => {
            const idSerie = greutate.classList[0].split("-")[1];
            const elemDeStersDinBaza = document.createElement('input');
            elemDeStersDinBaza.name = `sters-serie-${idSerie}`;
            elemDeStersDinBaza.type = "text";
            elemDeStersDinBaza.classList.add("deAscuns");
            if(greutate.classList[2]===undefined && element.classList[2]==undefined)
                divDeSters.appendChild(elemDeStersDinBaza);
            greutate.remove();
        });
        
        const randEx = document.querySelector(`.rand-${idMinus}`);
        const elemDeStersDinBaza = document.createElement('input');
        elemDeStersDinBaza.name = `sters-ex-${idMinus}`;
        elemDeStersDinBaza.type = "text";
        elemDeStersDinBaza.classList.add("deAscuns");
        if(element.classList[2]==undefined)
            divDeSters.appendChild(elemDeStersDinBaza);
        randEx.remove();
    });
}
function minusDay(element,divDeSters)
{
    element.addEventListener('click',()=>{
        const idMinus = element.classList[0].split("-")[1];
        const ziDeSters = document.querySelector(`.container-zi-${idMinus}`);

        var randuri = ziDeSters.querySelectorAll('.rand');
        randuri.forEach(element => {
            if(element.classList.length==2){
            const idEx = element.classList[1].split('-')[1];
            const Greutati = ziDeSters.querySelectorAll(`.greutate-${idEx}`);
            Greutati.forEach((greutate) => {
            const idSerie = greutate.classList[0].split("-")[1];
            const elemDeStersDinBaza = document.createElement('input');
            elemDeStersDinBaza.name = `sters-serie-${idSerie}`;
            elemDeStersDinBaza.type = "text";
            elemDeStersDinBaza.classList.add("deAscuns");
            if(greutate.classList[2]===undefined && element.classList[2]==undefined)
                divDeSters.appendChild(elemDeStersDinBaza);
            greutate.remove();
            });
        
            const elemDeStersDinBaza = document.createElement('input');
            elemDeStersDinBaza.name = `sters-ex-${idEx}`;
            elemDeStersDinBaza.type = "text";
            elemDeStersDinBaza.classList.add("deAscuns");
            if(element.classList[2]==undefined)
                divDeSters.appendChild(elemDeStersDinBaza);
            element.remove();
        }
        });

        const elemDeStersDinBaza = document.createElement('input');
        elemDeStersDinBaza.name = `sters-zi-${idMinus}`;
        elemDeStersDinBaza.type = "text";
        elemDeStersDinBaza.classList.add("deAscuns");
        if(element.classList[3]==undefined)
            divDeSters.appendChild(elemDeStersDinBaza);
        ziDeSters.remove();


        
    });
}
function functionalityToMinusForExercises()
{
    const minusuri = document.querySelectorAll('.minus-exercitiu');
    const divDeSters = document.querySelector('.pentruStersDinBaza');
    minusuri.forEach(element => {
        minusExercise(element,divDeSters);

    });
}
function functionalityMinusForDays()
{
    const minusuri = document.querySelectorAll('.minus-zi');
    const divDeSters = document.querySelector('.pentruStersDinBaza');
    minusuri.forEach(element => {
        minusDay(element,divDeSters);

    });
}

functionalityMinusForDays();
functionalityToMinusForExercises();
functionalityToMinusForSets();
export {minusSets,minusExercise,minusDay}