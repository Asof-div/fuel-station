<?php

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="adeyinkab24@gmail.com"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */

/**
 *  @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Fuel Station API Server"
 *  )
 */

/**
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 */

/**
 * @OA\Tag(
 *     name="project",
 *     description="Everything about your Projects",
 *     @OA\ExternalDocumentation(
 *         description="Find out more",
 *         url="http://swagger.io"
 *     )
 * )
 *
 * @OA\Tag(
 *     name="user",
 *     description="Operations about user",
 *     @OA\ExternalDocumentation(
 *         description="Find out more about",
 *         url="http://swagger.io"
 *     )
 * )
 * @OA\ExternalDocumentation(
 *     description="Find out more about Swagger",
 *     url="http://swagger.io"
 * )
 */

/**
 * @OA\Post(
 *      path="/api/auth/login",
 *      operationId="login",
 *      tags={"Auth"},
 *      summary="Login User",
 *      description="Login User",
 *	  	@OA\Parameter(
 *          name="email",
 *          description="User email",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *	  	@OA\Parameter(
 *          name="password",
 *          description="User Password",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="User successfully autheticated"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *       @OA\Response(response=422, description="Unprocessable Entity"),
 *     )
 *
 */
 


/**
 * @OA\Delete(
 *      path="/api/auth/logout",
 *      operationId="logout",
 *      tags={"Auth"},
 *      summary="Login User",
 *      description="Login User",
 *	  	@OA\Response(
 *          response=200,
 *          description="Successfully logged out"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *     )
 *
 */
 

/**
 * @OA\Get(
 *      path="/api/auth/user",
 *      operationId="getAuthUser",
 *      tags={"Auth"},
 *      summary="Get Current Authenticated User",
 *      description="Get Current Authenticated User",
 *      @OA\Response(
 *          response=200,
 *          description="User details"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/dispensers",
 *      operationId="getUser",
 *      tags={"User"},
 *      summary="Get Dispensers",
 *      description="Get Dispensers",
 *      @OA\Response(
 *          response=200,
 *          description="Dispensers"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/dispensers/{id}",
 *      operationId="getDispenser",
 *      tags={"Dispenser"},
 *      summary="Get Dispenser",
 *      description="Get Dispenser",
 *      @OA\Response(
 *          response=200,
 *          description="Dispenser"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/dispensers/report/{id}",
 *      operationId="getDispenserReport",
 *      tags={"Dispenser"},
 *      summary="Get Dispenser Report",
 *      description="Get Dispenser Report",
 *      @OA\Response(
 *          response=200,
 *          description="Dispenser"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Post(
 *      path="/api/app/dispensers",
 *      operationId="addDispenser",
 *      tags={"Dispenser"},
 *      summary="Get Dispensers",
 *      description="Get Dispensers",
 *      @OA\Parameter(
 *          name="name",
 *          description="Dispenser name",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *	  	@OA\Parameter(
 *          name="tank_id",
 *          description="Tank id",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Dispensers"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */

/**
 * @OA\Put(
 *      path="/api/app/dispensers/{id}",
 *      operationId="editDispenser",
 *      tags={"Dispenser"},
 *      summary="Edit Dispenser",
 *      description="Edit Dispenser",
 *      @OA\Parameter(
 *          name="name",
 *          description="Dispenser name",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *	  	@OA\Parameter(
 *          name="tank_id",
 *          description="Tank id",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="Dispensers"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */

/**
 * @OA\Delete(
 *      path="/api/app/dispensers/{id}",
 *      operationId="deleteDispenser",
 *      tags={"Dispenser"},
 *      summary="Delete Dispenser",
 *      description="Delete Dispenser",
 *      @OA\Response(
 *          response=200,
 *          description="Dispensers"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/tanks",
 *      operationId="getTanks",
 *      tags={"Tank"},
 *      summary="Get tanks",
 *      description="Get tanks",
 *      @OA\Response(
 *          response=200,
 *          description="tanks"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/tanks/{id}",
 *      operationId="getTank",
 *      tags={"Tank"},
 *      summary="Get Tank",
 *      description="Get Tank",
 *      @OA\Response(
 *          response=200,
 *          description="Tank"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Get(
 *      path="/api/app/tanks/report/{id}",
 *      operationId="getTankReport",
 *      tags={"Tank"},
 *      summary="Get Tank Report",
 *      description="Get Tank Report",
 *      @OA\Response(
 *          response=200,
 *          description="Tank"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Post(
 *      path="/api/app/tanks",
 *      operationId="addTank",
 *      tags={"Tank"},
 *      summary="Add tank",
 *      description="Add tank",
 *      @OA\Parameter(
 *          name="name",
 *          description="Tank name",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *	  	@OA\Parameter(
 *          name="volume",
 *          description="Tank size",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="tanks"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */

/**
 * @OA\Put(
 *      path="/api/app/tanks/{id}",
 *      operationId="editTank",
 *      tags={"Tank"},
 *      summary="Edit tank",
 *      description="Edit tank",
 *      @OA\Parameter(
 *          name="name",
 *          description="Tank name",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *	  	@OA\Parameter(
 *          name="volume",
 *          description="size of the tank",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="tanks"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */

/**
 * @OA\Delete(
 *      path="/api/app/tanks/{id}",
 *      operationId="deleteTank",
 *      tags={"Tank"},
 *      summary="Delete tank",
 *      description="Delete tank",
 *      @OA\Response(
 *          response=200,
 *          description="tank"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Get(
 *      path="/api/app/users",
 *      operationId="getUsers",
 *      tags={"User"},
 *      summary="Get Users",
 *      description="Return Users Attached To Tenant",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *       @OA\Response(response=422, description="Unprocessable Entity"),
 *     )
 *
 */


/**
 * @OA\Post(
 *      path="/api/app/users",
 *      operationId="createNewUser",
 *      tags={"User"},
 *      summary="Create new user",
 *      description="Return user data",
 *      @OA\Parameter(
 *          name="name",
 *          description="Firstname and Lastname ",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="email",
 *          description="Email",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="password",
 *          description="Password ",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="password_confirmation",
 *          description="Retry password",
 *          required=false,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *       @OA\Response(response=422, description="Unprocessable Entity"),
 *     )
 *
 */



/**
 * @OA\Put(
 *      path="/api/app/users/{id}",
 *      operationId="editUser",
 *      tags={"User"},
 *      summary="Create new user",
 *      description="Return user data",
 *      @OA\Parameter(
 *          name="name",
 *          description="Firstname and Lastname ",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="email",
 *          description="Email",
 *          required=true,
 *          in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *       @OA\Response(response=422, description="Unprocessable Entity"),
 *     )
 *
 */



/**
 * @OA\Delete(
 *      path="/api/app/users/{id}",
 *      operationId="deleteUser",
 *      tags={"User"},
 *      summary="Create new user",
 *      description="Return user data",
 *      @OA\Response(
 *          response=200,
 *          description="successful operation"
 *       ),
 *       @OA\Response(response=401, description="Unauthorized"),
 *       @OA\Response(response=422, description="Unprocessable Entity"),
 *     )
 *
 */



/**
 * @OA\Get(
 *      path="/api/app/fuels",
 *      operationId="getFuels",
 *      tags={"Fuel"},
 *      summary="Get fuels",
 *      description="Get fuels",
 *      @OA\Parameter(
 *          name="date",
 *          description="filter by date",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="date"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="fuels"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/fuels/delivery-template",
 *      operationId="downloadDeliveryTemplate",
 *      tags={"Fuel"},
 *      summary="Download delivery template",
 *      description="Download delivery template",
 *      @OA\Response(
 *          response=200,
 *          description="Fuel"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Get(
 *      path="/api/app/fuels/dispenser-template",
 *      operationId="downloadDisperserTemplate",
 *      tags={"Fuel"},
 *      summary="Download dispenser template",
 *      description="Download dispenser template",
 *      @OA\Response(
 *          response=200,
 *          description="Fuel"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Get(
 *      path="/api/app/fuels/{id}",
 *      operationId="getFuel",
 *      tags={"Fuel"},
 *      summary="Get Fuel Report",
 *      description="Get Fuel Report",
 *      @OA\Response(
 *          response=200,
 *          description="Fuel"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */



/**
 * @OA\Post(
 *      path="/api/app/fuels/delivery-upload",
 *      operationId="uploadDelivery",
 *      tags={"Fuel"},
 *      summary="Add Fuel",
 *      description="Add Fuel",
 *      @OA\Parameter(
 *          name="file",
 *          description="Excel file",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="file"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="fuels"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


/**
 * @OA\Post(
 *      path="/api/app/fuels/dispense-upload",
 *      operationId="uploadDispense",
 *      tags={"Fuel"},
 *      summary="Add Fuel",
 *      description="Add Fuel",
 *      @OA\Parameter(
 *          name="file",
 *          description="Excel file",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="file"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="fuels"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */




/**
 * @OA\Post(
 *      path="/api/app/fuels/delivery",
 *      operationId="addDelivery",
 *      tags={"Fuel"},
 *      summary="Add Fuel",
 *      description="Add Fuel",
 *      @OA\Parameter(
 *          name="tank_id",
 *          description="Tank id",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="litre",
 *          description="Litre",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="date",
 *          description="Date",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="date"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="fuels"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */





/**
 * @OA\Post(
 *      path="/api/app/fuels/dispense",
 *      operationId="addDispense",
 *      tags={"Fuel"},
 *      summary="Add Fuel",
 *      description="Add Fuel",
 *      @OA\Parameter(
 *          name="dispenser_id",
 *          description="Dispenser id",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="litre",
 *          description="Litre",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="string"
 *          )
 *      ),
 *      @OA\Parameter(
 *          name="date",
 *          description="Date",
 *          required=true,
 *			in="path",
 *          @OA\Schema(
 *              type="date"
 *          )
 *      ),
 *      @OA\Response(
 *          response=200,
 *          description="fuels"
 *       ),
 *       @OA\Response(response=401, description="Unauthenticated"),
 *     )
 *
 */


