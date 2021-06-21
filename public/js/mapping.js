import { estudiantes } from "/js/data.js";

export const edades = () => {
    const arr = estudiantes.map((e) => {
        let monthAct = new Date().getMonth();
        let yearAct = new Date().getFullYear();
        let year = new Date(e.nacimiento).getFullYear();
        let month = new Date(e.nacimiento).getMonth();
        let edad = yearAct - year;

        if (month > monthAct) {
            edad -= 1;
        }
        return edad;
    });
    return arr;
};

export const labelsAges = () => [...new Set(edades().sort())];

export const countAges = () => {

    let arr = edades().sort();
    let cont = 0;
    let arr2 = [];

    labelsAges().forEach(e => {
        arr.forEach(e2 => {
            if (e == e2) {
                cont +=1;
            }
        });
        arr2.push(cont);
        cont = 0;
    });
    
    return arr2;
}



export const total = () => {
    return estudiantes.length;
};

export const birthdayMonth = () => {
    var mes = new Date().getMonth();
    var count = 0;
    for (const student of estudiantes) {
        const month = new Date(student.nacimiento).getMonth();
        if (month == mes) {
            count++;
        }
    }
    return count;
};

export const gender = (genero) => {

    var count = 0
    for (const student of estudiantes) {
        const gender = student.sexo
        if (gender == genero) {
            count++
        }
    }
    return count
};
