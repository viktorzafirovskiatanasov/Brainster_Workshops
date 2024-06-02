

// class form
class Developer {
    constructor(name, surname, age, exp, position) {
        this.name = name;
        this.surname = surname;
        this.age = age;
        this.exp = exp;
        this.position = position;

        this.getSeniority = function () {
            if (this.exp <= 1) {
                return "junior";
            } else if (this.exp > 1 && this.exp < 3) {
                return "intermediate";
            } else {
                return "senior";
            }
        };

        this.display = function () {
            return `I am ${this.name} ${this.surname}, I am ${this.age} years old and I work as a ${this.getSeniority()} ${this.position}.`;
        };
    }
}

//function form
// function Developer(name, surname, age, exp, position) {
//     this.name = name;
//     this.surname = surname;
//     this.age = age;
//     this.exp = exp;
//     this.position = position;

//     this.getSeniority = function () {
//         if (this.exp <= 1) {
//             return "junior";
//         } else if (this.exp > 1 && this.exp < 3) {
//             return "intermediate";
//         } else {
//             return "senior";
//         }
//     };

//     this.display = function () {
//         return `I am ${this.name} ${this.surname}, I am ${
//             this.age
//         } years old and I work as a ${this.getSeniority()} ${this.position}.`;
//     };
// }
