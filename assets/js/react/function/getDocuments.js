import axios from "axios";
import {useState} from "react";

export function getDocuments(url) {
    const [documents, setDocuments] = useState([])
    const [isConnect, setIsConnect] = useState(false)

    const fetchAll = () => {
        axios.get(url)
            .then((response) => {
                setDocuments(response.data.documents);
                setIsConnect(response.data.isConnect);
            })
            .catch(function () {
                // always executed
            });
    }

    return  {
        documents,
        isConnect,
        fetchAll
    };

}