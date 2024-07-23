import React from "react";
import "./style.css";

const Button = ({
  text,
  onMouseClick,
  bgColor = "primary-bg",
  textColor = "white-text",
}) => {
  return (
    <button
      onClick={onMouseClick}
      className={`flex center rounded clickable ${bgColor} ${textColor} bold full-width button`}
    >
      {text}
    </button>
  );
};

export default Button;