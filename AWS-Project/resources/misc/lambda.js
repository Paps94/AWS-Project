import * as AWS from 'aws-sdk';
import { Context } from 'aws-lambda';
import * as Knex from 'knex';

//Our db credentials
const host = 'aws-project.cyv8f9wo5tpw.eu-west-2.rds.amazonaws.com';
const port = 3306;
const user = 'admin';
const password = 'admin123';
const database = 'aws_project_db';

const connection = {
  ssl: { rejectUnauthorized: false },
  host,
  user,
  password,
  database
};

//Making our connection
const knex = Knex({
    client: 'mysql',
    connection
});

//Handler function that will be invoked every time the lambda function is being called
//Technically speaking having set up a model should theoretically only call the lambda function if the data is valid
//But assuming that doesn't happen we would need to validate in here each value passed to the function
exports.handler = async (event) => {
    try {
        //Store our expected input to validate it
        const title = event.body.title;
        const description = event.body.description;
        const artist = event.body.artist;
        const no_of_past_owners = event.body.no_of_past_owners;
        const type = event.body.type;
        const for_sale = event.body.for_sale;
        const creation_date = event.body.creation_date;
        const value = event.body.value;
        const user_id = event.body.user_id;

        const valid = true;


        /* Assuming the model we created doesn't work or we shouldn't have that we would validate the input now
        and if something is wrong we flag valid as false and pass our validation message to the body
        Truth being told I am still not sure if i need to pass the validation message in a specific way back to my Laravel project
        I wrote some API function that expects a json response but then I would need to find a way to pass that back to my view and report
        the validation messages
        */

        const response = {
            statusCode: 200,
            body: event.body,
        };

        //Only if the data is valid we will store it in the db
        if (!valid) {
            //Make new 'failed' entry in our log table
            await knex('logs').insert({
                description: 'Describe what went wrong with the query submition',
            });

            response = {
                statusCode: 400,
                body: event.body,
            };

            return response;
        }

        //Insert our record in the DB
        await knex('art_pieces').insert({
            title: title,
            description: description,
            artist: artist,
            no_of_past_owners: no_of_past_owners,
            type: type,
            for_sale: for_sale,
            creation_date: creation_date,
            value: value,
            user_id: user_id,
        });

        return response;
    } catch (e) {
        console.log(e);
    }
};
