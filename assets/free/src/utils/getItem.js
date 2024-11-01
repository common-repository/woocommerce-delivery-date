import getItemIndex from "./getItemIndex";

const getItem = (findId, list) => {
  let index = getItemIndex(findId, list);
  if (index >= 0) {
    return list[index];
  } else {
    return null;
  }
}
export default getItem;