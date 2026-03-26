const videos = {
  abs: [
    { title: "Naturel Buttocs", url: "media/buttocs.mp4" },
    { title: "Crunch with pushing hands", url: "media/crunchwithpushinghands.mp4" },
    // ...jusqu’à 10 vidéos
  ],
  upper: [
    
   { title: "Shoulders", url: "media/shoulder1.mp4" }, 
    { title: "Warm up your shoulders", url: "media/shoulder2.mp4" },
    { title: "Triceps with bench", url: "media/triceps.mp4" },
      { title: "Biceps", url: "media/biceps2.mp4" },
           { title: "Chest", url: "media/chest.mp4" },
           { title: "Back", url: "media/back.mp4" },
    // ...
  
],

  lower: [
    { title: "Legs", url: "media/legs.mp4" },
    { title: "Full Lower", url: "media/hamstring.mp4" }, 
    { title: "calves", url: "media/calves.mp4" },
    // ...
  ],
 /*  pas encore termine(on a pas pu les termine)
 cardio: [
    { title: "Cardio 1", url: "" },
    // ...
  ],
  full: [
    { title: "Full Body 1", url: " },
    // ...
  ],
  others: [
    { title: "Mobility 1", url: "" },
    // ...
  ]*/
};

const container = document.getElementById("videosContainer");
const buttons = document.querySelectorAll(".categories button");

buttons.forEach(button => {
  button.addEventListener("click", () => {
    const type = button.getAttribute("data-type");
    displayVideos(type);
  });
});

function displayVideos(type) {
  container.innerHTML = "";
  if (!videos[type]) return;
  videos[type].forEach(video => {
    container.innerHTML += `
      <div class="video-card">
        <iframe src="${video.url}" frameborder="0" allowfullscreen></iframe>
        <p>${video.title}</p>
      </div>
    `;
  });
}
