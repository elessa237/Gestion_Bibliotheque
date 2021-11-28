import React, {useEffect} from "react";
import CardDownload from "./cardDownload";
import Card from "./Card";
import {getDocuments} from "../function/getDocuments";


export default function Documents() {

    const {documents, isConnect, fetchAll} = getDocuments("/api/documents")

    useEffect(() => {
        fetchAll()
    }, [])

    return (
        <div className="row row-sm">
            {documents.map((document) =>
                <div className="col-6 col-sm-4 col-md-3 col-lg-4 col-xl-3" key={document.id}>
                    <div className="card card-file">
                        {isConnect === true ? <CardDownload document={document}/> : <></>}
                        <Card document={document}/>
                    </div>
                </div>)
            }
        </div>
    )

}