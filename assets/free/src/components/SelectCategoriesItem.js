import React from 'react'

const SelectCategoriesItem = ({category, defaultChecked, onChange, disabled}) => {
  const elementId = 'dreamfox-'+category.value;
  return (
    <div className="dreamfox-select-categories-item">
      <input
        className="dreamfox-select-categories-item__input"
        type="checkbox"
        id={elementId}
        onChange={e => onChange(category.value, e.target.checked)}
        defaultChecked={defaultChecked}
        disabled={disabled}
      />
      <label className="dreamfox-select-categories-item__label" htmlFor={elementId}>{category.label}</label>
    </div>
  )
}

export default SelectCategoriesItem
