import React, { useEffect, useState } from 'react'
import { useDispatch, useSelector } from 'react-redux';
import { apiLoadCategories } from '../api/setttingApi';
import { loadAllCategories } from '../reducers/category-list';
import Loading from './Loading'
import SelectCategoriesItem from './SelectCategoriesItem';

const SelectCategories = ({defaultValues, onChange}) => {
  const LIMIT = 2
  const dispatch = useDispatch();
  const loaded = useSelector(state => {
    return state.categories.loaded;
  });
  const [selectedCategories, setSelectedCategories] = useState(defaultValues);
  useEffect(() => {
    if (!loaded) {
      apiLoadCategories((response) => {
        dispatch(loadAllCategories(response.data['categories']));
      });
    }
  }, [loaded]);
  const categories = useSelector(state => {
    return state.categories.list;
  });
  const [disabledCategories, setDisabledCategories] = useState([]);
  const makeDisabledCats = () => {
    let disabledCatsBuffer = []
    if (selectedCategories.length >= LIMIT) {
      for (const category of categories) {
        if (!selectedCategories.includes(category.value)) {
          disabledCatsBuffer.push(category.value)
        }
      }
    }
    setDisabledCategories([...disabledCatsBuffer]);
  }
  useEffect(() => {
    makeDisabledCats()
  }, [loaded, selectedCategories])
  const handleChangeCategories = (categoryId, checked) => {
    let newCategories = []
    if (checked) {
      newCategories = [...selectedCategories, categoryId]
    } else {
      // make other categories enable
      newCategories = selectedCategories.filter(element => element != categoryId);
    }
    setSelectedCategories([...newCategories]);
    makeDisabledCats()

    onChange(newCategories)
  }
  return (
    <div className="dreamfox-select-categories">
      {!loaded && <Loading message="Loading..."></Loading>}
      {loaded &&
        categories && categories.map(category => {
          return (<SelectCategoriesItem
            key={category.value}
            defaultChecked={selectedCategories.includes(category.value)}
            onChange={handleChangeCategories}
            disabled={disabledCategories.includes(category.value)}
            category={category} />)
        })
      }
    </div>
  )
}

export default SelectCategories
