document.addEventListener("DOMContentLoaded", function () {
  const needsValidation = document.querySelectorAll(".needs-validation");
  if (needsValidation) {
    needsValidation.forEach((element) => {
      element.addEventListener("submit", async (e) => {
        e.preventDefault();

        element.classList.add("was-validated");
      });
    });
  }

  const multipleSelect = document.querySelectorAll(".multiple-select");
  if (multipleSelect) {
    multipleSelect.forEach((element) => {
      window.TomSelect &&
        new TomSelect(element, {
          copyClassesToDropdown: false,
          controlInput: "<input>",
          render: {
            item: function (data, escape) {
              if (data.customProperties) {
                return (
                  '<div><span class="dropdown-item-indicator">' +
                  data.customProperties +
                  "</span>" +
                  escape(data.text) +
                  "</div>"
                );
              }
              return "<div>" + escape(data.text) + "</div>";
            },
            option: function (data, escape) {
              if (data.customProperties) {
                return (
                  '<div><span class="dropdown-item-indicator">' +
                  data.customProperties +
                  "</span>" +
                  escape(data.text) +
                  "</div>"
                );
              }
              return "<div>" + escape(data.text) + "</div>";
            },
          },
        });
    });
  }

  const datepickerIcon = document.querySelectorAll(".datepicker-icon");
  if (datepickerIcon) {
    datepickerIcon.forEach((element) => {
      window.Litepicker &&
        new Litepicker({
          element: element,
          buttonText: {
            previousMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
            nextMonth: `<svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
          },
        });
    });
  }

  const selectDefault = document.querySelectorAll(".select-default");
  if (selectDefault) {
    selectDefault.forEach((element) => {
      window.TomSelect &&
        new TomSelect(element, {
          copyClassesToDropdown: false,
          dropdownParent: "body",
          controlInput: "<input>",
          render: {
            item: function (data, escape) {
              if (data.customProperties) {
                return (
                  '<div><span class="dropdown-item-indicator">' +
                  data.customProperties +
                  "</span>" +
                  escape(data.text) +
                  "</div>"
                );
              }
              return "<div>" + escape(data.text) + "</div>";
            },
            option: function (data, escape) {
              if (data.customProperties) {
                return (
                  '<div><span class="dropdown-item-indicator">' +
                  data.customProperties +
                  "</span>" +
                  escape(data.text) +
                  "</div>"
                );
              }
              return "<div>" + escape(data.text) + "</div>";
            },
          },
        });
    });
  }
});
