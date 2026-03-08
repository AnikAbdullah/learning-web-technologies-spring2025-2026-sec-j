let current = "0";
let previous = "";
let operator = null;
let display;

function createDisplay() {
  display = document.createElement("input");
  display.type = "text";
  display.readOnly = true;
  display.value = "0";
  display.style.width = "200px";
  display.style.fontSize = "24px";
  display.style.textAlign = "right";
  display.style.marginBottom = "10px";
  document.body.appendChild(display);
}

function createButton(text) {
  let btn = document.createElement("button");
  btn.innerText = text;
  btn.style.width = "45px";
  btn.style.height = "40px";
  btn.style.margin = "2px";

  btn.onclick = function () {
    handleClick(text);
  };

  return btn;
}

function calculate(a, b, op) {
  if (op === "+") return a + b;
  if (op === "-") return a - b;
  if (op === "*") return a * b;
  if (op === "/") return b !== 0 ? a / b : "Err";
}

function handleClick(value) {
  if (!isNaN(value)) {
    current = current === "0" ? value : current + value;
    display.value = current;
  } else if (value === ".") {
    if (!current.includes(".")) {
      current += ".";
      display.value = current;
    }
  } else if (value === "AC") {
    current = "0";
    previous = "";
    operator = null;
    display.value = "0";
  } else if (value === "=") {
    if (operator) {
      let result = calculate(
        parseFloat(previous),
        parseFloat(current),
        operator,
      );
      display.value = result;
      current = String(result);
      previous = "";
      operator = null;
    }
  } else {
    previous = current;
    operator = value;
    current = "0";
  }
}

function init() {
  let wrapper = document.createElement("div");
  wrapper.style.width = "210px";
  wrapper.style.margin = "50px auto";
  document.body.appendChild(wrapper);

  createDisplay();
  wrapper.appendChild(display);

  let layout = [
    ["7", "8", "9", "/"],
    ["4", "5", "6", "*"],
    ["1", "2", "3", "-"],
    [".", "0", "AC", "+"],
    ["="],
  ];

  for (let i = 0; i < layout.length; i++) {
    let row = document.createElement("div");

    for (let j = 0; j < layout[i].length; j++) {
      row.appendChild(createButton(layout[i][j]));
    }

    wrapper.appendChild(row);
  }
}

init();
