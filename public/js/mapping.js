import { Estudiantes } from "/js/data.js";

export const mapping = () => {};

export const total = () => {
    return Estudiantes.length;
};

export const birthdayMonth = () => {
    var mes = new Date().getMonth();
    var count = 0;
    for (const student of Estudiantes) {
        const month = new Date(student.nacimiento).getMonth();
        if (month == mes) {
            count++;
        }
    }
    return count;
};

export const gender = (genero) => {

    var count = 0
    for (const student of Estudiantes) {
        const gender = student.sexo
        if (gender == genero) {
            count++
        }
    }
    return count
};
