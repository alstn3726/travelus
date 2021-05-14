const API_KEY =
  "6kjLX5Fy8TBleGLPoY7lHttj5Jw%2BZbCZgqyf9%2Fh1T2yWBmJkLZ2R3b5RJwMB7G2GarTb9X5pCLtu%2FkP1zvAygQ%3D%3D";
const tour = document.querySelector(".js-tour");

const input = document.querySelector("#searchFields");

function searchTour(keyword) {
  const url = `http://api.visitkorea.or.kr/openapi/service/rest/KorService/searchKeyword?ServiceKey=${API_KEY}&numOfRows=10&pageNo=1&keyword=${keyword}&MobileOS=ETC&MobileApp=AppTest&_type=json`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const results = data.response.body.items.item;

      const renderedResults = results.map(
        ({ addr1, title, firstimage, tel }) => {
          return `<li class="tour-item"><img class="tour-item-img" src=${firstimage} /><div class= "tour-item-info"><div class="tour-item-title">${title}</div>
          <diV>주소: ${addr1 ? addr1 : "등록된 주소가 없습니다."}</diV>
          <div>전화번호: ${
            tel ? tel : "등록된 전화번호가 없습니다."
          }</div></div></li>`;
        }
      );

      const innerHTML = renderedResults.join("");

      tourInfo.innerHTML = innerHTML;
    });
}

const handleKeyPress = (event) => {
  if (event.keyCode !== 13) return;

  localStorage.setItem("keyword", event.target.value);
  window.open("tourinfo.php", "_self");

  // searchTour(event.target.value);

  //사용자가 검색을 하면 새로운 페이지에서 검색결과를 보여준다
};

input.addEventListener("keypress", handleKeyPress);
