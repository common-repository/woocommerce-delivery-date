const doCallbackPerProperty = (obj, callback) => {
  for (const key in obj) {
    if (obj.hasOwnProperty(key)) {
      callback(key, obj[key])
    }
  }
}
export default doCallbackPerProperty;