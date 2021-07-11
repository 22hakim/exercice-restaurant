export default class DataStorage {
    

    saveDataToDomStorage(name, data)
    {
        window.localStorage.setItem(name, JSON.stringify(data));
    }

    loadDataFromDomStorage(name)
    {
        return JSON.parse(window.localStorage.getItem(name));
    }


}