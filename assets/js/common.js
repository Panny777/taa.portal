function clickLabel(id) {
    document.getElementsByClassName("overlay")[0].classList.add("active");
    // Adding class "active" to activate the popup
    document.getElementsByClassName("popup")[0].classList.add("active");
  
  }
  
  function removePopup() {
    document.getElementsByClassName("popup")[0].classList.remove("active");
    document.getElementsByClassName("overlay")[0].classList.remove("active");
    location.reload();
  }
  
  /**
   * It removes the class "active" from the first element with the class "overlay" and the first element
   * with the class "popup".
   */
  function closeModal() {
    document.getElementsByClassName("overlay")[0].classList.remove("active");
    document.getElementsByClassName("popup")[0].classList.remove("active");
  }
  