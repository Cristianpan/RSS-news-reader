import Pagination from "tui-pagination";
const paginatorContainer = document.getElementById("pagination");
const mediaQuery = window.matchMedia("(min-width: 480px)");
const url = new URLSearchParams(window.location.search);

const { total, perpage, page } = paginatorContainer.dataset;

const options = {
  totalItems: +total,
  itemsPerPages: +perpage,
  visiblePages: mediaQuery.matches ? 4 : 2,
  page: getCurrentPage(+total, +perpage, +page),
  template: {
    page: '<button type="button" class="pagination__page"><span>{{page}}</span></button>',
    currentPage:
      '<button type="button" class="pagination__page pagination__page--current"><span>{{page}}</span></button>',
    moveButton: ({ type }) => generateHTMLPagination(type),
    disabledMoveButton: ({ type }) => generateHTMLPagination(type, true),
    moreButton: '<button type="button" class="pagination__page"><span>...</span></button>',
  },
};

const pagination = new Pagination(paginatorContainer, options);

pagination.on("afterMove", ({ page }) => {
  url.set("page", page);
  window.location.href = `/?${url.toString()}`;
});

function getCurrentPage(total, perPage, currentPage) {
  const maxPage = Math.ceil(total / perPage);
  if (currentPage > maxPage) {
    return maxPage;
  }
  if (currentPage < 1) {
    return 1;
  }

  return currentPage;
}

function generateHTMLPagination(type, isDisabled = false) {
  switch (type) {
    case "first":
      return `<button type="button" title="primera página" class="pagination__page pagination__page--arrow ${
        isDisabled ? "pagination__page--disabled" : ""
      }"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" stroke-width="2" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                      <path fill-rule="evenodd" stroke-width="2" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                    </svg></button>`;
    case "last":
      return `<button type="button" title="última página" class="pagination__page pagination__page--arrow ${
        isDisabled ? "pagination__page--disabled" : ""
      }"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" stroke-width="2" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                      <path fill-rule="evenodd" stroke-width="2" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                    </svg></button>`;
    case "prev":
      return `<button type="button" title="anterior" class="pagination__page pagination__page--arrow ${
        isDisabled ? "pagination__page--disabled" : ""
      }">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                      </svg>
                    </button>`;
    case "next":
      return `<button type="button" title="siguiente" class="pagination__page pagination__page--arrow ${
        isDisabled ? "pagination__page--disabled" : ""
      }">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                      </svg>
                    </button>`;
  }
}
