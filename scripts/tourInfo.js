const getInfo = localStorage.getItem("keyword");
console.log(getInfo);

const tourInfo = document.querySelector(".js-tourInfo");
console.log(tourInfo);

const inputDetail = document.querySelector("#searchFields");
console.log(inputDetail);

const api =
  "6kjLX5Fy8TBleGLPoY7lHttj5Jw%2BZbCZgqyf9%2Fh1T2yWBmJkLZ2R3b5RJwMB7G2GarTb9X5pCLtu%2FkP1zvAygQ%3D%3D";

function searchTour(keyword) {
  const url = `http://api.visitkorea.or.kr/openapi/service/rest/KorService/searchKeyword?ServiceKey=${api}&numOfRows=50&pageNo=1&keyword=${keyword}&MobileOS=ETC&MobileApp=AppTest&_type=json`;

  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const results = data.response.body.items.item;
      console.log(results);
      const renderedResults = results.map(
        ({ addr1, addr2, title, firstimage, tel, mapx, mapy }) => {
          // console.log(mapx);
          // console.log(mapy);

          return `<li class="tour-item"><img class="tour-item-img" src=${firstimage} /><div class= "tour-item-info"><div class="tour-item-title">${title}</div>
            <diV>주소: ${
              addr1 ? addr1 : "등록된 주소가 없습니다."
            }${addr2}</diV>
            <div>전화번호: ${tel ? tel : "등록된 전화번호가 없습니다."}</div>
            <div><i id="kakaoMap" class="fas fa-map-marker-alt"><a href="https://map.kakao.com/map/${mapx},${mapy}">카카오 Map</a></i></div>
            </div></li>`;
        }
      );

      const innerHTML = renderedResults.join("");

      tourInfo.innerHTML = innerHTML;
      inputDetail.value = keyword;
    });
}

function init() {
  searchTour(getInfo);
}

init();
