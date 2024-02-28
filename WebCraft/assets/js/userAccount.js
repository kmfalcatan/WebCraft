function toggleSidebarAndProfile(element) {
  var userContainer = document.getElementById("userContainer");
  var topContainer = document.getElementById("topContainer");
  var profileContainer = document.getElementById("profileContainer");

  if (userContainer.classList.contains("sidebar")) {
    showProfileContainer(element);
  } else {
    userContainer.classList.toggle("sidebar");
    topContainer.classList.toggle("sidebar");
    profileContainer.classList.toggle("slideIn");
  }
}

function showProfileContainer(element) {
  var topContainer = document.getElementById("topContainer");
  topContainer.classList.add("sidebar");
  var profileContainer = document.getElementById("profileContainer");
  

  var userID = element.dataset.userid;
  var userData = getUserData(userID);
  var fullName = userData.fullname;
  var profileImg = userData.profileImg;
  var id = userData.id;
  var address = userData.address;
  var department = userData.department;
  var email = userData.email;
  var contact = userData.contact;
  var gender = userData.gender;
  var username = userData.username;

  profileContainer.innerHTML = "";

  var closeButton = document.createElement("button");
  closeButton.className = "closeButton";
  closeButton.textContent = "Close";
  closeButton.onclick = closeProfileContainer;

  var profileImgElement = document.createElement("img");
  profileImgElement.className = "profile_img_circle";
  profileImgElement.src = profileImg;
  profileImgElement.alt = "";

  var fullNameElement = document.createElement("p");
  fullNameElement.textContent = fullName;

  var idElement = document.createElement("p");

  var id = "0001"; 

  idElement.textContent = "" + formatDate(id);

  function formatDate(id) {
    var currentYear = new Date().getFullYear();
    var paddedId = id.toString().padStart(4, "0");
    return currentYear + "-" + paddedId;
  }


  var infoContainer = document.createElement("div");
  infoContainer.className = "infoContainer";

  var leftInfoGroup = document.createElement("div");
  leftInfoGroup.className = "infoGroup";
  var leftInfoGroupContent = document.createElement("div");
  leftInfoGroupContent.innerHTML = `
    <p>${username || ''}</p>
    <p>${email || ''}</p>
    <p>${contact || ''}</p>
  `;
  leftInfoGroup.appendChild(leftInfoGroupContent);

  var rightInfoGroup = document.createElement("div");
  rightInfoGroup.className = "infoGroup";
  var rightInfoGroupContent = document.createElement("div");
  rightInfoGroupContent.innerHTML = `
    <p>${department || ''}</p>
    <p>${address || ''}</p>
    <p>${gender || ''}</p>
  `;
  rightInfoGroup.appendChild(rightInfoGroupContent);

  infoContainer.appendChild(leftInfoGroup);
  infoContainer.appendChild(rightInfoGroup);

  var viewEquipmentLink = document.createElement("a");
  viewEquipmentLink.className = "link";
  viewEquipmentLink.href = "../admin panel/viewUserEquip.php?id=" + userID;
  viewEquipmentLink.textContent = "View Equipment";

  profileContainer.appendChild(closeButton);
  profileContainer.appendChild(profileImgElement);
  profileContainer.appendChild(fullNameElement);
  profileContainer.appendChild(idElement);
  profileContainer.appendChild(infoContainer);
  profileContainer.appendChild(viewEquipmentLink);

    profileContainer.style.marginRight = "0";
  }

function closeProfileContainer() {
  var userContainer = document.getElementById("userContainer");
  var topContainer = document.getElementById("topContainer");
  var profileContainer = document.getElementById("profileContainer");

  userContainer.classList.remove("sidebar");
  topContainer.classList.remove("sidebar");
  profileContainer.classList.remove("slideIn");
  profileContainer.style.marginRight = "-100%";
}

function getUserData(userID) {
  for (var i = 0; i < users.length; i++) {
    if (users[i].id == userID) {
      return {
        fullname: users[i].fullname,
        profileImg: "../uploads/" + users[i].profile_img,
        id: users[i].id,
        address: users[i].address,
        department: users[i].department,
        email: users[i].email,
        contact: users[i].contact,
        gender: users[i].gender,
        username: users[i].username
      };
    }
  }
  return "";
}