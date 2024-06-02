let cardContainer = document.querySelector("#card-container");
let fullRecipeContainer = document.querySelector("#full-recipe-container");
let searchContainer = document.querySelector("#search-container");
let tagContainer = document.querySelector("#tag-container");
let headerElement = document.querySelector("#headerElement");
let searchForm = document.querySelector("#search-form");

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function createCard(cardData) {
    let card = document.createElement("div");
    let cimage = document.createElement("div");
    let title = document.createElement("h5");
    let contents = document.createElement("div");
    let actions = document.createElement("div");

    card.classList.add("card");

    cimage.classList.add("card-image");
    let img = document.createElement("img");
    img.src = "./images/" + getRandomInt(1, 29) + ".jpg";
    cimage.appendChild(img);

    title.innerText = cardData.name;

    contents.classList.add("card-content");
    contents.appendChild(title);

    //Here make changes on tags
    cardData.tags.forEach((tag) => {
        let tagLink = document.createElement("a");
        tagLink.innerText = "#" + tag;
        contents.appendChild(tagLink);

        tagLink.addEventListener("click", function (e) {
            let clickedTag = e.target.innerText;
            let pureTag = clickedTag.replace("#", "");
            location.hash = "#tag-" + pureTag;

            let filteredData = recipeData.filter((singleRecipe) => {
                return singleRecipe.tags.includes(pureTag);
            });

            tagContainer.innerHTML = "";
            for (let i = 0; i < filteredData.length; i++) {
                let card = createCard(filteredData[i]);
                tagContainer.appendChild(card);
            }
            console.log(filteredData);
        });
    });

    actions.classList.add("card-action");
    let link = document.createElement("a");
    link.innerText = "Open Recipe";
    link.classList.add("waves-effect", "waves-light", "btn", "orange");
    link.href = "#" + cardData.id;
    actions.appendChild(link);

    card.appendChild(cimage);
    card.appendChild(contents);
    card.appendChild(actions);

    return card;
}

function renderRecipe() {
    let id = location.hash.replace("#", "");
    let recipe = recipeData.find((r) => r.id === id);

    fullRecipeContainer.innerHTML = "";

    let wrapper = document.createElement("div");
    let card = document.createElement("div");
    let cimage = document.createElement("div");
    let title = document.createElement("h3");
    let contents = document.createElement("div");

    wrapper.classList.add("full-recipe-wrapper");

    title.innerText = recipe.name;

    cimage.classList.add("card-image");
    let img = document.createElement("img");
    img.src = "./images/" + getRandomInt(1, 29) + ".jpg";
    cimage.appendChild(img);

    contents.classList.add("card-content");
    let p = document.createElement("p");
    p.innerText = recipe.instructions;
    let h4Instructions = document.createElement("h4");
    h4Instructions.innerText = "Instructions";

    contents.appendChild(h4Instructions);
    contents.appendChild(p);

    card.classList.add("card");
    card.appendChild(cimage);
    card.appendChild(contents);

    wrapper.appendChild(title);
    wrapper.appendChild(card);

    fullRecipeContainer.appendChild(wrapper);
}

// Exercise 1 - draw cards on screen using the
// createCard function.
for (let i = 0; i < recipeData.length; i++) {
    let card = createCard(recipeData[i]);
    cardContainer.appendChild(card);
}

//Exercise 2 - create a router

function handleRoute(e) {
    const currentHash = location.hash;

    fullRecipeContainer.style.display = "none";
    tagContainer.style.display = "none";
    cardContainer.style.display = "none";
    searchContainer.style.display = "none";

    if (currentHash == "" || currentHash == "#") {
        cardContainer.style.display = "flex";
    } else if (currentHash.includes("tag-")) {
        //also usable option currentHash.substring(1, 5) == "tag-"
        tagContainer.style.display = "flex";
    } else if (currentHash.includes("search-")) {
        searchContainer.style.display = "flex";
    } else {
        renderRecipe();
        fullRecipeContainer.style.display = "flex";
    }
}

window.addEventListener("load", handleRoute);

window.addEventListener("hashchange", handleRoute);

//Exercise 6 - return to home page

headerElement.addEventListener("click", (e) => {
    location.hash = "";
});

//Exercise 6 - add a search form

searchForm.addEventListener("submit", (e) => {
    e.preventDefault();
    let inputVal = e.target.elements[0].value; //hgfdgdfgd
    location.hash = "#search-" + inputVal;

    let searchedData = recipeData.filter((singleRecipe) => {
        return singleRecipe.name.toLowerCase().includes(inputVal.toLowerCase());
    });

    searchContainer.innerHTML = "";

    if (!searchedData.length) {
      searchContainer.innerHTML = `<b>No results for ${inputVal}</b>`;
    } else {
      for (let i = 0; i < searchedData.length; i++) {
        let card = createCard(searchedData[i]);
        searchContainer.appendChild(card);
      }
    }
});


