//Brandy Dan 103864526
import React, { useState } from "react";

const CheckboxComponent = () => {
  const [isChecked, setIsChecked] = useState(false);

  const handleCheckboxChange = () => {
    setIsChecked(!isChecked);
  };

  return (
    <div>
      <label>
        {/* Creates a checkbox */}
        <input
          type="checkbox"
          checked={isChecked}
          onChange={handleCheckboxChange}
        />
        I accept the
        <b>
          <a href="google.com"> terms and service</a>
        </b>
      </label>
    </div>
  );
};

export default CheckboxComponent;
