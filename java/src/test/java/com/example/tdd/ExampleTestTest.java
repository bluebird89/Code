package com.example.tdd;

import org.junit.jupiter.api.Assertions;
import org.junit.jupiter.api.Disabled;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import org.junit.jupiter.params.ParameterizedTest;
import org.junit.jupiter.params.provider.ValueSource;

import static org.junit.jupiter.api.Assertions.assertEquals;

class ExampleTestTest {
	@Test
	@Disabled("Not implemented yet")
	@DisplayName("Should demonstrate a simple assertion")
	void shouldShowSimpleAssertion() {
		Assertions.assertEquals(1, 1);
	}

	@Test
	@DisplayName("Should check all items in the list")
	void shouldCheckAllItemsInTheList() {
		// List<Integer> numbers = List.of(2, 3, 5, 7);
		//
		// Assertions.assertEquals(2, numbers.get(0));
		// Assertions.assertEquals(3, numbers.get(1));
		// Assertions.assertEquals(5, numbers.get(2));
		// Assertions.assertEquals(7, numbers.get(3));
	}

	@Test
	@DisplayName("Should only run the test if some criteria are met")
	void shouldOnlyRunTheTestIfSomeCriteriaAreMet() {
		// Assumptions.assumeTrue(Fixture.apiVersion() > 10);
		assertEquals(1, 1);
	}

	@ParameterizedTest
	@DisplayName("Should create shapes with different numbers of sides")
	@ValueSource(ints = {3, 4, 5, 8, 14})
	void shouldCreateShapesWithDifferentNumbersOfSides(int expectedNumberOfSides) {
		// Shape shape = new Shape(expectedNumberOfSides);
		// assertEquals(expectedNumberOfSides, shape.numberOfSides());
	}

	// @ParameterizedTest(name = "{0}")
	// @DisplayName("Should not create shapes with invalid numbers of sides")
	// @ValueSource(ints = {0, 1, 2, Integer.MAX_VALUE})
	// void shouldNotCreateShapesWithInvalidNumbersOfSides(int expectedNumberOfSides) {
	// 	assertThrows(IllegalArgumentException.class,
	// 			() -> new Shape(expectedNumberOfSides));
	// }

	// @Nested
	// @DisplayName("When a shape has been created")
	// class WhenShapeExists {
	// 	private final Shape shape = new Shape(4);
	// 	@Nested
	// 	@DisplayName("Should allow")
	// 	class ShouldAllow {
	// 		@Test
	// 		@DisplayName("seeing the number of sides")
	// 		void seeingTheNumberOfSides() {
	// 			assertEquals(4, shape.numberOfSides());
	// 		}
	// 		@Test
	// 		@DisplayName("seeing the description")
	// 		void seeingTheDescription() {
	// 			assertEquals("Square", shape.description());
	// 		}
	// 	}
	//
	// 	@Nested
	// 	@DisplayName("Should not")
	// 	class ShouldNot {
	// 		@Test
	// 		@DisplayName("be equal to another shape with the same number of sides")
	// 		void beEqualToAnotherShapeWithTheSameNumberOfSides() {
	// 			assertNotEquals(new Shape(4), shape);
	// 		}
	// 	}
	// }
}
