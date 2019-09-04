let formData = new FormData(); // chooses input from form

fetch("api/participants/getComments.php", {
  method: "POST",
  body: formData
}).then(response => {
  response.json().then(data => {
    console.log(data);
    const tbody = document.querySelector("tbody");
    data.comments.forEach(value => {
      const tr = document.createElement("tr");
      const td1 = document.createElement("td");
      const td2 = document.createElement("td");
      const td3 = document.createElement("td");

      td1.append(value.name);
      td2.append(value.time);
      td3.append(value.comment);

      tr.append(td1, td2, td3);
      tbody.append(tr);
    });
  });
});
